import { createContext, useContext, useState, useEffect } from 'react';

const WishlistContext = createContext();

export const WishlistProvider = ({ children }) => {
  const [wishlist, setWishlist] = useState(() => {
    const saved = localStorage.getItem('tmdb-wishlist');
    return saved ? JSON.parse(saved) : [];
  });

  const addToWishlist = (movie) => {
    setWishlist(prev => {
      const exists = prev.some(item => item.id === movie.id);
      const updatedWishlist = exists ? prev : [...prev, movie];
      localStorage.setItem('tmdb-wishlist', JSON.stringify(updatedWishlist)); // تحديث الـ localStorage فوراً
      return updatedWishlist;
    });
  };

  const removeFromWishlist = (movieId) => {
    setWishlist(prev => {
      const updatedWishlist = prev.filter(item => item.id !== movieId);
      localStorage.setItem('tmdb-wishlist', JSON.stringify(updatedWishlist)); // تحديث الـ localStorage فوراً
      return updatedWishlist;
    });
  };

  const isInWishlist = (movieId) => {
    return wishlist.some(item => item.id === movieId);
  };

  return (
    <WishlistContext.Provider value={{ 
      wishlist, 
      addToWishlist, 
      removeFromWishlist,
      isInWishlist,
      wishlistCount: wishlist.length 
    }}>
      {children}
    </WishlistContext.Provider>
  );
};

export const useWishlist = () => {
  const context = useContext(WishlistContext);
  if (!context) {
    throw new Error('useWishlist must be used within a WishlistProvider');
  }
  return context;
};

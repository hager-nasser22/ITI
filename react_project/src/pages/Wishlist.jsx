import { useWishlist } from '../context/WishlistContext';
import { useLanguage } from '../context/LanguageContext';
import { Link } from 'react-router-dom';
import MovieCard from '../components/MovieCard'; 
import '../assets/css/Wishlist.css';
import { HeartOff } from "lucide-react"; 

const Wishlist = ({type}) => {
  const { wishlist } = useWishlist();
  const { t } = useLanguage();
  const filteredWishlist = wishlist.filter(item => item.type === type);

  return (
    <div className="wishlist-page">
      <h2>{t('wishlist')}</h2> 
      {wishlist.length === 0 ? (
        <div className="flex flex-col items-center justify-center p-8 text-gray-400">
          <HeartOff className="empty-icon" size={150} />
          <p>{t('noMoviesInWishlist')}</p> 
          <Link to="/" className="back-to-home">
            {t('backToHome')} 
          </Link>
        </div>
      ) : (
        <>
          <div className="wishlist-grid">
            {filteredWishlist.map((movie) => (
              <MovieCard
                key={movie.id}
                id={movie.id}
                posterPath={movie.posterPath}
                title={movie.title}
                releaseDate={movie.releaseDate}
                rating={movie.rating}
              />
            ))}
          </div>
          <Link to="/" className="back-to-home">
            {t('backToHome')}
          </Link>
        </>
      )}
    </div>
  );
};

export default Wishlist;
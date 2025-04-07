import { createContext, useContext, useState, useEffect } from 'react';

const LanguageContext = createContext();

const supportedLanguages = {
  en: { code: 'en', name: 'English', dir: 'ltr' },
  ar: { code: 'ar', name: 'العربية', dir: 'rtl' },
  fr: { code: 'fr', name: 'Français', dir: 'ltr' },
  es: { code: 'es', name: 'Español', dir: 'ltr' },
  zh: { code: 'zh', name: '中文', dir: 'ltr' }
};

// Translation dictionary
const translations = {
  en: {
    wishlist: 'Wishlist',
    movies: 'Movies',
    tvShows: 'TV Shows',
    unknownDate: 'Unknown Date',
    welcomeMessage: 'Welcome to our movie app',
    welcomeDescription: 'Millions of movies, TV shows and people to discover. Explore now.',
    searchPlaceholder: 'Search and explore...',
    search: 'Search',
    nowPlaying: 'Now Playing',
    searchResults: 'Search Results',
    searchingFor: 'Searching for',
    resultsFound: 'results found',
    popularTvShows: 'Popular TV Shows',
    noResultsFound: 'No results found. Please try a different search term.',
    duration: 'Duration',
    minutes: 'minutes',
    language: 'Language'
  },
  ar: {
    wishlist: 'قائمة المفضلة',
    movies: 'أفلام',
    tvShows: 'مسلسلات',
    unknownDate: 'تاريخ غير معروف',
    welcomeMessage: 'مرحباً بك في تطبيق الأفلام',
    welcomeDescription: 'ملايين الأفلام والمسلسلات والأشخاص لاكتشافها. استكشف الآن.',
    searchPlaceholder: 'ابحث واستكشف...',
    search: 'بحث',
    nowPlaying: 'يعرض الآن',
    searchResults: 'نتائج البحث',
    searchingFor: 'البحث عن',
    resultsFound: 'نتائج وجدت',
    noResultsFound: 'لم يتم العثور على نتائج. يرجى تجربة مصطلح بحث مختلف.',
    recommendations: 'توصيات',
    popularTvShows: 'المسلسلات الشائعة',
    duration: 'المدة',
    minutes: 'دقيقة',
    language: 'اللغة'
  },
  fr: {
    wishlist: 'Liste de souhaits',
    movies: 'Films',
    tvShows: 'Émissions',
    unknownDate: 'Date inconnue',
    welcomeMessage: 'Bienvenue sur notre application de films',
    welcomeDescription: 'Des millions de films, d\'émissions TV et de personnes à découvrir. Explorez maintenant.',
    searchPlaceholder: 'Rechercher et explorer...',
    search: 'Rechercher',
    nowPlaying: 'À l\'affiche',
    searchResults: 'Résultats de recherche',
    searchingFor: 'Recherche pour',
    resultsFound: 'résultats trouvés',
    noResultsFound: 'Aucun résultat trouvé. Veuillez essayer un terme de recherche différent.',
    recommendations: 'Recommandations',
    popularTvShows: 'Émissions populaires',
    duration: 'Durée',
    minutes: 'minutes',
    language: 'Langue'
  },
  zh: {
    wishlist: '收藏列表',
    movies: '电影',
    tvShows: '电视节目',
    unknownDate: '未知日期',
    welcomeMessage: '欢迎来到我们的电影应用',
    welcomeDescription: '数百万部电影、电视节目和人物等待您的发现。立即探索。',
    searchPlaceholder: '搜索和探索...',
    search: '搜索',
    nowPlaying: '正在热映',
    searchResults: '搜索结果',
    searchingFor: '搜索',
    resultsFound: '个结果',
    noResultsFound: '未找到结果。请尝试不同的搜索词。',
    recommendations: '推荐',
    popularTvShows: '热门电视节目',
    duration: '时长',
    minutes: '分钟',
    language: '语言'
  }
};


export const LanguageProvider = ({ children }) => {
  const [language, setLanguage] = useState(() => {
    const savedLang = localStorage.getItem('tmdb-language');
    return savedLang && supportedLanguages[savedLang] ? savedLang : 'en';
  });

  useEffect(() => {
    localStorage.setItem('tmdb-language', language);
    document.documentElement.lang = language;
    document.documentElement.dir = supportedLanguages[language].dir;
  }, [language]);

  const changeLanguage = (langCode) => {
    if (supportedLanguages[langCode]) {
      setLanguage(langCode);
    }
  };

  // Translation function
  const t = (key) => {
    return translations[language]?.[key] || key;
  };

  return (
    <LanguageContext.Provider value={{ 
      language,
      languages: Object.values(supportedLanguages),
      changeLanguage,
      t // expose translation function
    }}>
      {children}
    </LanguageContext.Provider>
  );
};

export const useLanguage = () => {
  const context = useContext(LanguageContext);
  if (!context) {
    throw new Error('useLanguage must be used within a LanguageProvider');
  }
  return context;
};
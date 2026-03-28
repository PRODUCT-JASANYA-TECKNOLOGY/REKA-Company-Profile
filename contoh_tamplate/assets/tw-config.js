// Tailwind CDN config — loaded after cdn.tailwindcss.com
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        grotesk: ['Space Grotesk', 'sans-serif'],
        inter: ['Inter', 'sans-serif'],
      },
      colors: {
        dark: {
          DEFAULT: '#0d0d0d',
          surface: '#141414',
          card: '#1a1a1a',
          border: '#2a2a2a',
        },
        reka: {
          muted: '#f5f5f5',
          'muted-fg': '#6b6b6b',
          border: '#e0e0e0',
        },
      },
      boxShadow: {
        'note': '3px 5px 18px rgba(0,0,0,.12), 0 1px 3px rgba(0,0,0,.08)',
        'card-hover': '0 8px 40px rgba(0,0,0,.12)',
      },
      borderRadius: {
        '4xl': '2rem',
      },
      transitionProperty: {
        'card': 'transform, box-shadow, border-color',
      },
    }
  }
};

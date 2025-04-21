import { Appearance } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { useState } from 'react';

import { storeData, getData } from './config/asyncStorage';
import * as SplashScreen from 'expo-splash-screen';

import { AuthProvider, useAuth } from "./context/AuthContext"
import { ThemeContext } from './context/ThemeContext';

SplashScreen.preventAutoHideAsync();

import GuestStack from "./navigation/GuestStack";
import AppStack from "./navigation/AppStack";

const AppContent = () => {
  const { loggedInUser } = useAuth();
  const [theme, setTheme] = useState({ mode: Appearance.getColorScheme() });

  const updateTheme = (newTheme) => {
    let mode;
    if (!newTheme) {
      mode = theme.mode === 'dark' ? 'light' : 'dark';
      newTheme = { mode };
    }
    setTheme(newTheme);
    storeData('homeTheme', newTheme);
  };

  return (    
    <ThemeContext.Provider value={{ theme, updateTheme }}>
      <NavigationContainer>
        {loggedInUser ? <AppStack /> : <GuestStack />}
      </NavigationContainer>
    </ThemeContext.Provider>
  );
};

const App = () => {
  return (
    <AuthProvider>
      <AppContent />
    </AuthProvider>
  );
}

export default App;

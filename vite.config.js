import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  build: {
    manifest: true,  // Assurez-vous que le manifeste est généré
    outDir: 'public/build',  // Le répertoire de sortie
  },
});

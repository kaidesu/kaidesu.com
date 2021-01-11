import 'alpinejs'
import Prism from 'prismjs'

Prism.highlightAll();

window.updateTheme = function() {
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.querySelector('html').classList.add('dark')
    } else {
        document.querySelector('html').classList.remove('dark')
    }
}

window.updateTheme()
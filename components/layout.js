import Header from './header'
import Footer from './footer'

export default function Layout({ children }) {
  return (
    <div className="font-sans">
      <div className="max-w-7xl mx-auto flex flex-col p-6">
        <Header />

        <main>
          { children }
        </main>

        <Footer />
      </div>
    </div>
  )
}
import Footer from '@/components/containers/Footer'
import Header from '@/components/containers/Header'
import { Html, Head, Main, NextScript } from 'next/document'

export default function Document() {
  return (
    <Html lang="en">
      <Head />
      <body>
        <Header />
        <Main />
        
        <NextScript />
        <Footer />
      </body>
    </Html>
  )
}

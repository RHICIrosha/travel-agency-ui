import type { Metadata } from "next";
import Link from "next/link";
import "./globals.css";

export const metadata: Metadata = {
  title: "Sandun Travels | Premium Sri Lankan Travel Experience",
  description:
    "A creative, animated travel website for Sri Lankan tours, luxury escapes, and international travelers.",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en" suppressHydrationWarning>
      <body className="bg-[#092b18] text-white" suppressHydrationWarning>
        <nav className="fixed top-0 left-0 right-0 z-50 p-6 px-6 lg:px-10 pointer-events-none">
          <header className="mx-auto max-w-7xl glass-panel shine-border flex items-center justify-between rounded-full px-5 py-4 text-sm text-emerald-50 shadow-2xl pointer-events-auto">
            <div>
              <Link href="/">
                <p className="text-lg font-semibold tracking-[0.24em] text-white uppercase hover:text-yellow-400 transition cursor-pointer">
                  Sandun Travels
                </p>
              </Link>
            </div>
            <div className="hidden gap-8 md:flex">
              <Link href="/#destinations" className="transition hover:text-yellow-400">
                Destinations
              </Link>
              <Link href="/tours" className="transition hover:text-yellow-400 font-semibold text-yellow-400">
                Holidays & Tours
              </Link>
              <Link href="/#services" className="transition hover:text-yellow-400">
                Services
              </Link>
              <Link href="/#contact" className="transition hover:text-yellow-400">
                Contact
              </Link>
            </div>
            <Link
              href="/#contact"
              className="rounded-full bg-white px-4 py-2 font-medium text-emerald-950 transition hover:scale-[1.03] cursor-pointer"
            >
              Plan Trip
            </Link>
          </header>
        </nav>
        {children}
      </body>
    </html>
  );
}

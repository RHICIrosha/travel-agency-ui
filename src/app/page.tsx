"use client";

import Image from "next/image";
import Link from "next/link";
import { motion } from "framer-motion";

const highlights = [
  {
    title: "Curated Sri Lanka journeys",
    copy: "Tailored routes for beaches, heritage, wildlife, and tea country.",
  },
  {
    title: "Premium foreign traveler support",
    copy: "Concierge-style planning, airport pickup, and flexible trip design.",
  },
  {
    title: "Animated storytelling UI",
    copy: "Motion-led cards, image layers, and map-inspired destination flow.",
  },
];

const destinations = [
  {
    name: "Galle Coast Escape",
    image:
      "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80",
    tag: "Beach Luxury",
  },
  {
    name: "Ella Hill Journey",
    image:
      "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80",
    tag: "Tea Country",
  },
  {
    name: "Wildlife Safari",
    image:
      "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=80",
    tag: "Adventure",
  },
  {
    name: "Cultural Triangle",
    image:
      "https://images.unsplash.com/photo-1519608487953-e999c86e7455?auto=format&fit=crop&w=1200&q=80",
    tag: "Heritage",
  },
];

const services = [
  "Private island transfers",
  "Luxury villa and hotel booking",
  "Family tours and honeymoon packages",
  "Airport meet-and-greet assistance",
  "Multi-country itineraries",
  "Map-based custom route planning",
];

export default function Home() {
  return (
    <main className="relative overflow-hidden">
      <section className="grid-pattern relative">
        <div className="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.08),transparent_30%)]" />
        <div className="mx-auto flex min-h-screen max-w-7xl flex-col px-6 pb-16 pt-32 lg:px-10">
          <div className="grid flex-1 items-center gap-10 py-10 lg:grid-cols-[1.05fr_0.95fr] lg:py-16">
            <motion.div
              initial={{ opacity: 0, y: 24 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.7 }}
              className="relative z-10"
            >
              <span className="inline-flex rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-amber-200 shadow-lg backdrop-blur">
                Sri Lanka travel agency built for international clients
              </span>
              <h1 className="mt-6 max-w-3xl text-5xl font-semibold leading-none tracking-tight text-white sm:text-6xl lg:text-7xl">
                Animated travel experiences with a premium visual story.
              </h1>
              <p className="mt-6 max-w-2xl text-lg leading-8 text-emerald-100/70 sm:text-xl">
                A creative travel website concept with cinematic images, layered
                cards, destination highlights, and smooth motion for a modern
                tourism brand.
              </p>

              <div className="mt-8 flex flex-wrap gap-4">
                <Link
                  href="/tours"
                  className="rounded-full bg-yellow-400 px-6 py-3 font-semibold text-emerald-950 transition hover:scale-[1.03]"
                >
                  Explore Holidays & Tours
                </Link>
                <a
                  href="#services"
                  className="rounded-full border border-white/15 bg-white/5 px-6 py-3 font-semibold text-white backdrop-blur transition hover:bg-white/10"
                >
                  View Services
                </a>
              </div>

              <div className="mt-10 grid gap-4 sm:grid-cols-3">
                {highlights.map((item, index) => (
                  <motion.article
                    key={item.title}
                    initial={{ opacity: 0, y: 18 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ delay: 0.15 * index, duration: 0.6 }}
                    className="glass-panel shine-border rounded-3xl p-5"
                  >
                    <p className="text-sm uppercase tracking-[0.2em] text-yellow-400">
                      0{index + 1}
                    </p>
                    <h2 className="mt-3 text-lg font-semibold text-white">
                      {item.title}
                    </h2>
                    <p className="mt-2 text-sm leading-6 text-emerald-100/70">
                      {item.copy}
                    </p>
                  </motion.article>
                ))}
              </div>
            </motion.div>

            <motion.div
              initial={{ opacity: 0, scale: 0.96, rotate: -1 }}
              animate={{ opacity: 1, scale: 1, rotate: 0 }}
              transition={{ duration: 0.8 }}
              className="relative"
            >
              <div className="absolute -left-5 top-10 h-28 w-28 rounded-full bg-yellow-400/25 blur-3xl floaty" />
              <div className="absolute right-3 top-20 h-32 w-32 rounded-full bg-emerald-500/20 blur-3xl floaty" />

              <div className="glass-panel shine-border relative overflow-hidden rounded-[2rem] p-4 shadow-[0_30px_120px_rgba(0,0,0,0.45)]">
                <div className="relative aspect-[4/5] overflow-hidden rounded-[1.5rem]">
                  <Image
                    src="https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=1400&q=80"
                    alt="Luxury tropical travel destination"
                    fill
                    priority
                    className="object-cover"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-[#031008] via-[#031008]/20 to-transparent" />
                </div>

                <div className="absolute left-6 top-6 rounded-2xl bg-[#020a05]/40 px-4 py-3 border border-white/10 backdrop-blur-xl">
                  <p className="text-xs uppercase tracking-[0.25em] text-yellow-400">
                    Live Route
                  </p>
                  <p className="mt-1 text-sm text-white">Colombo → Kandy → Ella → Galle</p>
                </div>

                <div className="absolute bottom-6 left-6 right-6 grid gap-3 sm:grid-cols-2">
                  <div className="glass-panel rounded-2xl p-4">
                    <p className="text-xs uppercase tracking-[0.2em] text-emerald-100/70">
                      Popular choice
                    </p>
                    <p className="mt-2 text-2xl font-semibold text-white">9 Days</p>
                    <p className="text-sm text-emerald-100/70">Luxury island discovery</p>
                  </div>
                  <div className="glass-panel rounded-2xl p-4">
                    <p className="text-xs uppercase tracking-[0.2em] text-emerald-100/70">
                      Travel style
                    </p>
                    <p className="mt-2 text-2xl font-semibold text-white">Premium</p>
                    <p className="text-sm text-emerald-100/70">International standard service</p>
                  </div>
                </div>
              </div>

              <div className="mt-5 grid gap-4 sm:grid-cols-2">
                <motion.div
                  whileHover={{ y: -6 }}
                  className="glass-panel shine-border overflow-hidden rounded-[1.75rem] p-3"
                >
                  <div className="relative h-44 overflow-hidden rounded-[1.25rem]">
                    <Image
                      src={destinations[0].image}
                      alt={destinations[0].name}
                      fill
                      className="object-cover"
                    />
                  </div>
                  <p className="mt-4 text-xs uppercase tracking-[0.2em] text-yellow-400">
                    {destinations[0].tag}
                  </p>
                  <p className="mt-1 text-lg font-medium text-white">
                    {destinations[0].name}
                  </p>
                </motion.div>

                <motion.div
                  whileHover={{ y: -6 }}
                  className="glass-panel shine-border overflow-hidden rounded-[1.75rem] p-3"
                >
                  <div className="relative h-44 overflow-hidden rounded-[1.25rem]">
                    <Image
                      src={destinations[1].image}
                      alt={destinations[1].name}
                      fill
                      className="object-cover"
                    />
                  </div>
                  <p className="mt-4 text-xs uppercase tracking-[0.2em] text-yellow-400">
                    {destinations[1].tag}
                  </p>
                  <p className="mt-1 text-lg font-medium text-white">
                    {destinations[1].name}
                  </p>
                </motion.div>
              </div>
            </motion.div>
          </div>
        </div>
      </section>

      <section id="destinations" className="mx-auto max-w-7xl px-6 py-20 lg:px-10">
        <div className="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
          <div>
            <p className="text-sm uppercase tracking-[0.35em] text-yellow-400">
              Featured destinations
            </p>
            <h2 className="mt-3 text-3xl font-semibold text-white sm:text-4xl">
              More images, more feeling, more story.
            </h2>
          </div>
          <p className="max-w-xl text-emerald-100/70">
            This section is built to show stronger travel visuals, letting each card
            feel like a destination postcard with motion and depth.
          </p>
        </div>

        <div className="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
          {destinations.map((item, index) => (
            <motion.article
              key={item.name}
              initial={{ opacity: 0, y: 22 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true, amount: 0.2 }}
              transition={{ delay: index * 0.08 }}
              whileHover={{ y: -8 }}
              className="glass-panel shine-border overflow-hidden rounded-[1.75rem] p-3"
            >
              <div className="relative h-72 overflow-hidden rounded-[1.25rem]">
                <Image src={item.image} alt={item.name} fill className="object-cover transition duration-700 hover:scale-110" />
                <div className="absolute inset-0 bg-gradient-to-t from-[#031008] via-transparent to-transparent" />
                <span className="absolute left-4 top-4 rounded-full bg-[#031008]/40 border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.25em] text-white backdrop-blur">
                  {item.tag}
                </span>
              </div>
              <div className="p-4">
                <p className="text-lg font-semibold text-white">{item.name}</p>
                <p className="mt-2 text-sm leading-6 text-emerald-100/70">
                  Smooth image-led layout designed for premium tours, resorts,
                  and destination highlights.
                </p>
              </div>
            </motion.article>
          ))}
        </div>
      </section>

      <section id="services" className="mx-auto max-w-7xl px-6 py-10 lg:px-10">
        <div className="grid gap-6 lg:grid-cols-[0.85fr_1.15fr]">
          <div className="glass-panel shine-border rounded-[2rem] p-8">
            <p className="text-sm uppercase tracking-[0.35em] text-yellow-400">
              Travel services
            </p>
            <h2 className="mt-3 text-3xl font-semibold text-white">
              Designed for a real travel business, not just a template.
            </h2>
            <p className="mt-4 text-emerald-100/70 leading-7">
              The layout is ready for hotel booking, package tours, foreign client
              inquiries, and future backend integration.
            </p>

            <div className="mt-6 grid gap-3">
              {services.map((service) => (
                <div key={service} className="rounded-2xl border border-emerald-500/10 bg-emerald-500/5 px-4 py-3 text-emerald-50">
                  {service}
                </div>
              ))}
            </div>
          </div>

          <div className="grid gap-6 md:grid-cols-2">
            <motion.div
              whileHover={{ scale: 1.02 }}
              className="glass-panel shine-border overflow-hidden rounded-[2rem] p-3"
            >
              <div className="relative h-72 overflow-hidden rounded-[1.5rem]">
                <Image
                  src={destinations[2].image}
                  alt={destinations[2].name}
                  fill
                  className="object-cover"
                />
              </div>
              <div className="p-4">
                <p className="text-sm uppercase tracking-[0.25em] text-yellow-400">
                  Safari motion
                </p>
                <p className="mt-1 text-xl font-medium text-white">Wildlife and adventure storytelling</p>
              </div>
            </motion.div>

            <motion.div
              whileHover={{ scale: 1.02 }}
              className="glass-panel shine-border overflow-hidden rounded-[2rem] p-3"
            >
              <div className="relative h-72 overflow-hidden rounded-[1.5rem]">
                <Image
                  src={destinations[3].image}
                  alt={destinations[3].name}
                  fill
                  className="object-cover"
                />
              </div>
              <div className="p-4">
                <p className="text-sm uppercase tracking-[0.25em] text-yellow-400">
                  Heritage flow
                </p>
                <p className="mt-1 text-xl font-medium text-white">Culture-rich destination highlights</p>
              </div>
            </motion.div>
          </div>
        </div>
      </section>

      <section id="contact" className="mx-auto max-w-7xl px-6 py-20 lg:px-10">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          className="glass-panel shine-border relative overflow-hidden rounded-[2.5rem] p-8 lg:p-12"
        >
          <div className="absolute inset-0 shimmer bg-[linear-gradient(120deg,rgba(255,255,255,0.08),transparent,rgba(255,255,255,0.04))] opacity-50" />
          <div className="relative grid gap-8 lg:grid-cols-[1fr_0.95fr] lg:items-center">
            <div>
              <p className="text-sm uppercase tracking-[0.35em] text-yellow-400">
                Ready to launch
              </p>
              <h2 className="mt-3 text-4xl font-semibold text-white sm:text-5xl">
                Let’s turn this into a polished travel brand website.
              </h2>
              <p className="mt-4 max-w-2xl text-emerald-100/70 leading-7">
                The project now has a strong visual foundation: animated hero,
                layered images, destination cards, service blocks, and a premium
                travel-agency feel.
              </p>

              <div className="mt-8 flex flex-wrap gap-4 text-sm">
                <span className="rounded-full border border-emerald-500/20 bg-emerald-500/10 px-4 py-2 text-emerald-50">
                  SEO-ready structure
                </span>
                <span className="rounded-full border border-emerald-500/20 bg-emerald-500/10 px-4 py-2 text-emerald-50">
                  Mobile responsive layout
                </span>
                <span className="rounded-full border border-emerald-500/20 bg-emerald-500/10 px-4 py-2 text-emerald-50">
                  Easy to expand later
                </span>
              </div>
            </div>

            <div className="grid gap-4 sm:grid-cols-2">
              <div className="glass-panel rounded-[1.75rem] p-5">
                <p className="text-sm text-emerald-100/70">Primary audience</p>
                <p className="mt-2 text-2xl font-semibold text-white">Foreign travelers</p>
              </div>
              <div className="glass-panel rounded-[1.75rem] p-5">
                <p className="text-sm text-emerald-100/70">Visual direction</p>
                <p className="mt-2 text-2xl font-semibold text-white">Luxury + motion</p>
              </div>
              <div className="glass-panel rounded-[1.75rem] p-5 sm:col-span-2">
                <p className="text-sm text-emerald-100/70">Best next step</p>
                <p className="mt-2 text-2xl font-semibold text-white">Add itinerary pages, inquiry forms, and more destination imagery.</p>
              </div>
            </div>
          </div>
        </motion.div>
      </section>
    </main>
  );
}

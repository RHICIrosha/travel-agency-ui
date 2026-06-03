"use client";

import Link from "next/link";
import { useState } from "react";
import Image from "next/image";
import { motion, AnimatePresence } from "framer-motion";

const packages = [
  {
    id: "pkg-1",
    title: "Sri Lanka Tailor Made 10 Days - Dream Route",
    duration: "10 Days",
    destination: "Sri Lanka",
    image:
      "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=80",
    description:
      "A thrilling 10 days dedicated to Sri Lanka's finest national parks and cultural triangles.",
    price: "From USD 1,500",
    tag: "Tailor Made Tours",
    itinerary: [
      { day: "Day 01", location: "Colombo", desc: "Airport pickup & transfer to Colombo hotel." },
      { day: "Day 02", location: "Minneriya", desc: "Elephant Gathering at Minneriya National Park." },
      { day: "Day 03", location: "Kandy", desc: "Temple of the Tooth & Cultural Show." },
      { day: "Day 04", location: "Yala", desc: "Evening Jeep Safari looking for leopards." },
      { day: "Day 05", location: "Yala", desc: "Morning Safari & transfer to beach." },
      { day: "Day 06-09", location: "Galle", desc: "Relaxation and Galle Fort tour." },
      { day: "Day 10", location: "Airport", desc: "Departure." },
    ],
  },
  {
    id: "pkg-2",
    title: "14 Days Journey Culture and Nature",
    duration: "14 Days",
    destination: "Sri Lanka",
    image:
      "https://images.unsplash.com/photo-1519608487953-e999c86e7455?auto=format&fit=crop&w=1200&q=80",
    description:
      "The perfect blend of ancient ruins, iconic train rides, and lush wildlife reserves with small group adventures.",
    price: "From USD 2,670",
    tag: "Fixed Departures",
    itinerary: [
      { day: "Day 01", location: "Negombo", desc: "Arrival and rest by the shore." },
      { day: "Day 02-03", location: "Sigiriya", desc: "Climb the Lion Rock & Village tour." },
      { day: "Day 04", location: "Kandy", desc: "Scenic drive to Kandy, spice gardens." },
      { day: "Day 05-06", location: "Ella", desc: "World famous train ride & Nine Arch Bridge." },
      { day: "Day 07-08", location: "Udawalawe", desc: "Elephant sanctuary safari." },
      { day: "Day 09-13", location: "Bentota", desc: "Sunset beach dinner & relaxation." },
      { day: "Day 14", location: "Airport", desc: "Transfer to Airport." },
    ],
  },
  {
    id: "pkg-3",
    title: "Maldives Getaway Local Island Stay 4",
    duration: "4 Days 3 Nights",
    destination: "Maldives",
    image:
      "https://images.unsplash.com/photo-1514282401047-d79a71a590e8?auto=format&fit=crop&w=1200&q=80",
    description:
      "Experience the Maldives without the high costs. Beautiful beaches and vibrant atmosphere.",
    price: "From USD 625",
    tag: "Getaway Holidays",
    itinerary: [
      { day: "Day 01", location: "Male", desc: "Speedboat transfer to local island." },
      { day: "Day 02", location: "Maafushi", desc: "Snorkeling trip and sandbank visit." },
      { day: "Day 03", location: "Maafushi", desc: "Dolphin watching and sunset cruise." },
      { day: "Day 04", location: "Airport", desc: "Return to Velana International Airport." },
    ],
  },
];

const sideBarCategories = {
  Destinations: ["Sri Lanka", "Maldives", "Vietnam", "Indonesia", "Dubai", "Cambodia", "Singapore", "Malaysia"],
  "Trip Type": ["Tailor Made Tours", "Fixed Departures", "Getaway", "Fixed Tours"],
  "Tour Theme": ["Honeymoon", "Wildlife", "Golf", "Cycling", "Adventure", "Photography"]
}

export default function TourPackages() {
  const [selectedId, setSelectedId] = useState<string | null>(null);

  return (
    <section id="packages" className="mx-auto max-w-[1400px] px-6 py-20 lg:px-10">
      <div className="mb-12 border-b border-emerald-900/50 pb-8 text-center md:text-left">
        <h2 className="text-4xl font-bold text-white sm:text-5xl">
          Tours & Destinations
        </h2>
        <p className="mt-4 text-emerald-100/70 max-w-2xl">
          Use the filters below to find the perfect tailor made tour, fixed departure, or holiday getaway. 
          Click on any tour card to view the exact routing and day-by-day itinerary.
        </p>
      </div>

      <div className="grid gap-10 lg:grid-cols-[280px_1fr] items-start">
        {/* Sidebar Filters */}
        <aside className="glass-panel shine-border sticky top-24 rounded-[1.5rem] p-6 hidden lg:block bg-emerald-950/20">
          <div className="mb-6 pb-6 border-b border-emerald-800/50">
            <h3 className="text-lg font-semibold text-white mb-4">Number of Days</h3>
            <div className="flex justify-between text-emerald-300 text-sm mb-2 px-1">
              <span>3</span>
              <span>6</span>
              <span>9</span>
              <span>12</span>
              <span>15+</span>
            </div>
            <input type="range" min="3" max="15" className="w-full accent-yellow-400 cursor-pointer" />
          </div>

          <div className="space-y-6">
            {Object.entries(sideBarCategories).map(([title, items]) => (
              <div key={title} className="pb-6 border-b border-emerald-800/50 last:border-0 last:pb-0">
                <h3 className="text-lg font-semibold text-white mb-4">{title}</h3>
                <div className="space-y-3">
                  {items.map(item => (
                    <label key={item} className="flex items-center gap-3 cursor-pointer group">
                      <div className="w-5 h-5 rounded border border-emerald-700 bg-emerald-950/50 group-hover:border-yellow-400 flex items-center justify-center transition-colors">
                        {/* Checkmark placeholder */}
                      </div>
                      <span className="text-emerald-100/80 group-hover:text-white transition-colors text-sm">
                        {item}
                      </span>
                    </label>
                  ))}
                </div>
              </div>
            ))}
          </div>
        </aside>

        {/* Tour List */}
        <div className="flex flex-col gap-8">
          {packages.map((pkg) => {
            const isSelected = selectedId === pkg.id;

            return (
              <motion.div
                layout
                key={pkg.id}
                onClick={() => setSelectedId(isSelected ? null : pkg.id)}
                className={`glass-panel shine-border cursor-pointer overflow-hidden rounded-[2rem] transition-all hover:bg-emerald-950/40 relative ${
                  isSelected ? "bg-emerald-950/40" : ""
                }`}
              >
                <div className="absolute top-0 right-8 bg-yellow-400 text-[#092b18] px-4 py-1.5 rounded-b-xl text-xs font-bold uppercase tracking-wider z-20">
                  {pkg.tag}
                </div>

                <div className="grid md:grid-cols-[300px_1fr] gap-6 p-4">
                  {/* Image Section */}
                  <motion.div layout className="relative h-64 md:h-full min-h-[250px] w-full overflow-hidden rounded-[1.5rem]">
                    <Image
                      src={pkg.image}
                      alt={pkg.title}
                      fill
                      className="object-cover transition duration-700 hover:scale-110"
                    />
                    <div className="absolute inset-0 bg-gradient-to-t from-[#020a05] via-transparent to-transparent" />
                    <span className="absolute left-4 bottom-4 px-3 py-1 text-sm font-semibold tracking-wider text-white drop-shadow-md">
                      📍 {pkg.destination}
                    </span>
                  </motion.div>

                  {/* Content Section */}
                  <div className="flex flex-col justify-center p-4">
                    <motion.h3 layout className="text-2xl font-semibold text-white pr-20">
                      {pkg.title}
                    </motion.h3>
                    <motion.div layout className="mt-4 flex items-center gap-4 flex-wrap">
                      <span className="rounded-md bg-emerald-900/50 px-3 py-1 text-sm font-medium text-emerald-200 border border-emerald-700/50 flex items-center gap-1.5">
                        <svg className="w-4 h-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {pkg.duration}
                      </span>
                      <span className="text-lg font-bold text-yellow-400">{pkg.price}</span>
                    </motion.div>
                    
                    <motion.p layout className="mt-4 text-emerald-100/70 leading-relaxed text-sm">
                      {pkg.description}
                    </motion.p>

                    {!isSelected && (
                      <motion.div layout className="mt-6 flex justify-between items-center">
                        <span className="inline-flex items-center gap-2 text-sm font-medium text-yellow-400 hover:text-yellow-300">
                          View Itinerary & Map <span className="text-lg">↓</span>
                        </span>
                        
                        <Link href={`/tours/${pkg.id}`} className="px-5 py-2 text-sm font-bold text-[#092b18] bg-yellow-400 rounded-full hover:bg-yellow-300 transition-colors">
                          View Tour
                        </Link>
                      </motion.div>
                    )}

                    {/* Expanded Itinerary / Map View */}
                    <AnimatePresence>
                      {isSelected && (
                        <motion.div
                          initial={{ opacity: 0, height: 0 }}
                          animate={{ opacity: 1, height: "auto" }}
                          exit={{ opacity: 0, height: 0 }}
                          transition={{ duration: 0.4 }}
                          className="mt-8 border-t border-emerald-500/20 pt-8"
                        >
                          <div className="mb-10 bg-emerald-950/40 p-6 rounded-2xl border border-emerald-800/50 relative overflow-hidden">
                            <div className="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay" />
                            <h4 className="flex items-center justify-center gap-2 mb-6 text-xs font-bold uppercase tracking-widest text-yellow-400 relative z-10">
                              <span className="text-base">🗺️</span> Interactive Tour Map
                            </h4>
                            <div className="flex flex-wrap justify-center items-center gap-x-2 gap-y-4 relative z-10">
                              {pkg.itinerary.map((day, idx) => (
                                <div key={`map-${idx}`} className="flex items-center">
                                  <div className="bg-emerald-900/60 border border-yellow-400/30 text-white px-3 py-1.5 rounded-full text-xs font-medium whitespace-nowrap shadow-[0_0_10px_rgba(16,185,129,0.1)]">
                                    {day.location}
                                  </div>
                                  {idx < pkg.itinerary.length - 1 && (
                                    <div className="w-6 sm:w-10 h-0 border-t-[2px] border-dashed border-yellow-400/40 mx-1 relative">
                                      <motion.div 
                                        initial={{ left: "0%" }}
                                        animate={{ left: "100%" }}
                                        transition={{ duration: 1.5, repeat: Infinity, ease: "linear", delay: idx * 0.2 }}
                                        className="absolute -top-[3px] w-1.5 h-1.5 bg-yellow-400 rounded-full shadow-[0_0_5px_rgba(250,204,21,1)]" 
                                      />
                                    </div>
                                  )}
                                </div>
                              ))}
                            </div>
                          </div>
                          
                          <div className="relative pl-2 pb-4">
                            {/* Animated Dashed Map Path Line */}
                            <div className="absolute left-[27px] top-6 bottom-6 w-0 border-l-[3px] border-dashed border-yellow-400/30">
                               {/* Animated travelling dot */}
                               <motion.div 
                                 initial={{ top: "0%" }}
                                 animate={{ top: "100%" }}
                                 transition={{ duration: 4, repeat: Infinity, ease: "linear" }}
                                 className="absolute -left-[7.5px] w-3 h-3 bg-yellow-400 rounded-full shadow-[0_0_10px_rgba(250,204,21,1)] z-20" 
                               />
                            </div>
                            
                            <div className="flex flex-col gap-8">
                              {pkg.itinerary.map((day, idx) => (
                                <div key={idx} className="relative flex items-start gap-8 group">
                                  {/* Map Pin Node */}
                                  <div className="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-emerald-800 to-emerald-950 border-[2px] border-yellow-400 shadow-[0_0_15px_rgba(250,204,21,0.2)] group-hover:bg-yellow-400 transition-colors duration-500">
                                    <span className="text-sm group-hover:scale-110 transition-transform duration-300">📍</span>
                                  </div>
                                  
                                  {/* Day Content */}
                                  <div className="flex-1 bg-emerald-950/20 p-5 rounded-2xl border border-emerald-800/30 hover:border-yellow-400/30 transition-all duration-300 hover:bg-emerald-900/40 hover:-translate-y-1 hover:shadow-lg hover:shadow-emerald-900/20 cursor-pointer">
                                    <div className="flex items-center gap-3 mb-2">
                                      <span className="bg-yellow-400 text-emerald-950 px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-widest">
                                        {day.day}
                                      </span>
                                      <span className="text-xl font-bold text-white">
                                        {day.location}
                                      </span>
                                    </div>
                                    <p className="text-sm text-emerald-100/80 leading-relaxed">
                                      {day.desc}
                                    </p>
                                  </div>
                                </div>
                              ))}
                            </div>
                          </div>

                          <div className="mt-8 flex gap-4 justify-end">
                            <button className="rounded-full border border-emerald-600 px-6 py-2 text-sm font-semibold text-emerald-100 transition hover:bg-emerald-900/50">
                              Hide Itinerary
                            </button>
                            <button className="rounded-full bg-yellow-400 px-6 py-2 block text-sm font-bold text-emerald-950 transition hover:bg-yellow-300 hover:scale-105">
                              Inquire About This Tour
                            </button>
                          </div>
                        </motion.div>
                      )}
                    </AnimatePresence>
                  </div>
                </div>
              </motion.div>
            );
          })}
        </div>
      </div>
    </section>
  );
}
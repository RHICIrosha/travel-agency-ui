"use client";

import { useParams } from "next/navigation";
import Image from "next/image";
import Link from "next/link";
import { motion } from "framer-motion";

// Mock data based on the single package details
const tourDetails = {
  id: "pkg-1",
  title: "Sri Lanka Tailor Made 10 Days - Dream Route",
  duration: "10 Days 9 Nights",
  theme: ["Culture", "Wildlife", "Beach"],
  cities: ["Negombo", "Anuradhapura", "Sigiriya", "Kandy", "Nuwara Eliya", "Yala", "Kalutara", "Colombo"],
  price: "USD 1,500",
  heroImage: "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1920&q=80",
  overview: "Sri Lanka is perfect for couples to relax on stunning beaches, explore misty hills and waterfalls, or go on adventures through rainforests and mountains.",
  days: [
    {
      day: "Day 01",
      location: "Negombo",
      desc: "Arrival and assistant at the airport, Proceed to Negombo. Go on a boat ride along the Hamilton canal.",
      activityList: [
        "Arrival and assistant at the airport",
        "Proceed to Negombo",
        "Visit the St. Mary's Church Negombo",
        "Boat ride along the Hamilton canal",
        "Negombo Fish Market & Sunset"
      ],
      accommodation: "Regal Reseau (4 Star)",
      meal: "Half Board",
      travel: "Airport to Hotel - 15 Minutes",
      transport: "Private Car",
      images: [
        "https://images.unsplash.com/photo-1620942548231-15c0e2a8c3d8?auto=format&fit=crop&w=640&q=80",
        "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=640&q=80"
      ]
    },
    {
      day: "Day 02",
      location: "Anuradhapura",
      desc: "Explore ancient ruins and early capitals of Sri Lanka.",
      activityList: [
        "Proceed to Anuradhapura after breakfast",
        "Visit Ruwanwalisaya & local temples",
        "Climb Mihintale Rock to witness sunset",
        "Jeep safari at Wilpattu National Park (Optional)"
      ],
      accommodation: "The Lake Forest (4 Star)",
      meal: "Breakfast & Dinner",
      travel: "Negombo to Anuradhapura - 4 Hours",
      transport: "Private Car",
      images: [
        "https://images.unsplash.com/photo-1582236315682-1ddcd93ad2a6?auto=format&fit=crop&w=640&q=80",
        "https://images.unsplash.com/photo-1628151241165-bcffcb664e52?auto=format&fit=crop&w=640&q=80"
      ]
    },
    {
      day: "Day 03",
      location: "Sigiriya",
      desc: "Climb the iconic Sigiriya Rock Fortress and Minneriya.",
      activityList: [
        "Climb the Sigiriya Rock Fortress",
        "Experience Minneriya National Park safari",
        "Traditional Sri Lankan boat ride"
      ],
      accommodation: "Sigiriya Jungles (4.5 Star)",
      meal: "Breakfast & Dinner",
      travel: "Anuradhapura to Sigiriya - 2 Hours",
      transport: "Private Car",
      images: [
        "https://images.unsplash.com/photo-1588614959060-4d144f28b207?auto=format&fit=crop&w=640&q=80"
      ]
    }
  ]
};

export default function TourDetail() {
  const params = useParams();
  const _pkgId = params?.id; 
  // In a real app we'd fetch data based on _pkgId
  const tour = tourDetails; 

  return (
    <main className="min-h-screen bg-[#092b18] pb-20 relative">
      {/* Global Topographic Background */}
      <div className="absolute inset-0 opacity-[0.05] bg-[url('https://www.transparenttextures.com/patterns/topography.png')] pointer-events-none z-0" />
      
      {/* Hero Header */}
      <div className="relative h-[60vh] w-full z-10">
        <Image
          src={tour.heroImage}
          alt={tour.title}
          fill
          className="object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-t from-[#092b18] via-[#092b18]/60 to-transparent" />
        <div className="absolute bottom-0 left-0 w-full p-8 md:p-16 max-w-7xl mx-auto">
          <Link href="/tours" className="text-yellow-400 hover:text-yellow-300 font-semibold flex items-center gap-2 mb-6">
            <span>←</span> Back to Tours
          </Link>
          <span className="bg-yellow-400 text-[#092b18] px-4 py-1.5 rounded-full text-sm font-bold uppercase tracking-wider mb-4 inline-block">
            {tour.duration}
          </span>
          <h1 className="text-4xl md:text-6xl font-bold text-white mb-6">
            {tour.title}
          </h1>
          <div className="flex flex-wrap gap-4 text-emerald-100">
            <span className="flex items-center gap-2">💰 Starting at <strong className="text-yellow-400 text-xl">{tour.price}</strong> pp</span>
            <span className="flex items-center gap-2">📍 {tour.cities.length} Cities</span>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 lg:px-10 mt-12 grid grid-cols-1 lg:grid-cols-[1fr_350px] gap-12 relative z-10">
        
        {/* Main Content */}
        <div className="space-y-16">
          
          {/* Enhanced Visual Map / Route Timeline Section */}
          <motion.section 
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="relative rounded-[2.5rem] p-8 md:p-12 lg:p-16 border-2 border-emerald-700/50 shadow-2xl overflow-hidden bg-[#05180f]"
          >
            {/* REAL ATLAS & TOPOGRAPHY MAP BACKGROUND */}
            <div className="absolute inset-0 z-0">
               {/* Base Atlas Map Image */}
               <Image 
                 src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=2000&q=80"
                 alt="Vintage Map Background"
                 fill
                 className="object-cover opacity-50 mix-blend-screen grayscale"
               />
               {/* Green Blend to keep the theme */}
               <div className="absolute inset-0 bg-emerald-950/80 mix-blend-multiply pointer-events-none" />
               
               {/* Topographic Lines overlay */}
               <div className="absolute inset-0 opacity-40 bg-[url('https://www.transparenttextures.com/patterns/topography.png')] pointer-events-none" />
               
               {/* Radial Fade to focus the center map area */}
               <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_transparent_10%,_#05180f_95%)] pointer-events-none" />
            </div>
            
            <h2 className="relative z-10 text-3xl font-bold text-white mb-16 flex items-center justify-center gap-4 text-center drop-shadow-md">
              <span className="text-yellow-400 bg-emerald-900/80 p-3 rounded-2xl shadow-lg border border-yellow-400/30 backdrop-blur-md">🗺️</span> 
              Interactive Route Map
            </h2>
            
            <div className="relative z-10 flex flex-wrap justify-center items-center gap-y-16 gap-x-1 py-4">
              {tour.cities.map((city, idx) => (
                <div key={city} className="flex items-center">
                  <motion.div 
                    initial={{ scale: 0 }}
                    whileInView={{ scale: 1 }}
                    transition={{ delay: idx * 0.1, type: "spring" }}
                    viewport={{ once: true }}
                    className="group relative flex flex-col items-center"
                  >
                    {/* Map Pin Node */}
                    <div className="h-16 w-16 rounded-full bg-gradient-to-br from-emerald-800 to-emerald-950 border-[3px] border-yellow-400 flex items-center justify-center shadow-[0_0_25px_rgba(250,204,21,0.3)] z-10 group-hover:bg-yellow-400 transition-colors duration-500 cursor-pointer relative overflow-hidden">
                      <div className="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity" />
                      <span className="text-2xl group-hover:scale-110 transition-transform duration-300">📍</span>
                    </div>
                    {/* City Label */}
                    <span className="absolute -bottom-10 text-white font-bold text-sm whitespace-nowrap bg-emerald-950/90 px-4 py-1.5 rounded-full border border-emerald-700/50 shadow-lg translate-y-0 group-hover:-translate-y-1 transition-transform">
                      {city}
                    </span>
                  </motion.div>
                  
                  {/* Dashed map trail connecting cities */}
                  {idx < tour.cities.length - 1 && (
                    <div className="w-8 sm:w-16 md:w-20 lg:w-24 h-0 border-t-[3px] border-dashed border-yellow-400/40 mb-10 relative">
                       {/* Animated travelling dot on the trail */}
                       <motion.div 
                         initial={{ left: "0%" }}
                         animate={{ left: "100%" }}
                         transition={{ duration: 2, repeat: Infinity, ease: "linear", delay: idx * 0.2 }}
                         className="absolute -top-[7px] w-3 h-3 bg-yellow-400 rounded-full shadow-[0_0_10px_rgba(250,204,21,1)]" 
                       />
                    </div>
                  )}
                </div>
              ))}
            </div>
          </motion.section>

          {/* Detailed Itinerary */}
          <section>
            <h2 className="text-4xl font-bold text-white mb-12 border-b border-emerald-800/50 pb-6 flex items-center gap-4">
              <span className="text-yellow-400">📅</span> Day by Day Itinerary
            </h2>
            
            <div className="space-y-20 relative px-2">
              {/* Dotted Trail Line spanning the whole timeline */}
              <div className="absolute left-[39px] top-12 bottom-10 w-0 border-l-[4px] border-dashed border-yellow-400/30" />
              
              {tour.days.map((day, idx) => (
                <motion.div 
                  initial={{ opacity: 0, x: -30 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  viewport={{ once: true, margin: "-100px" }}
                  transition={{ duration: 0.5 }}
                  key={idx} 
                  className="relative pl-24 md:pl-28"
                >
                  {/* Timeline Date Marker */}
                  <div className="absolute left-0 top-0 h-20 w-20 rounded-[1.2rem] bg-emerald-950 border-2 border-emerald-500/50 flex flex-col items-center justify-center shadow-[0_0_20px_rgba(16,185,129,0.2)] z-10 overflow-hidden group hover:border-yellow-400 transition-colors">
                    <div className="absolute top-0 w-full h-1/3 bg-emerald-900/50 group-hover:bg-yellow-400/20 transition-colors" />
                    <span className="text-[10px] font-black uppercase text-emerald-400 tracking-widest mt-1">Day</span>
                    <span className="text-3xl font-black text-yellow-400 leading-none">{String(idx + 1).padStart(2, '0')}</span>
                  </div>

                  {/* Day Content Card */}
                  <div className="glass-panel p-8 md:p-10 rounded-[2.5rem] bg-emerald-950/20 border border-emerald-800/30 hover:bg-emerald-900/30 transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-900/20 relative overflow-hidden">
                    {/* Decorative map contour lines in background */}
                    <div className="absolute -right-20 -top-20 opacity-5 pointer-events-none">
                      <svg width="200" height="200" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10,50 Q25,25 50,50 T90,50" fill="none" stroke="white" strokeWidth="2"/>
                        <path d="M10,70 Q25,45 50,70 T90,70" fill="none" stroke="white" strokeWidth="2"/>
                        <path d="M10,30 Q25,5 50,30 T90,30" fill="none" stroke="white" strokeWidth="2"/>
                      </svg>
                    </div>

                    <div className="flex items-center gap-4 mb-2">
                       <span className="bg-yellow-400 text-emerald-950 px-3 py-1 rounded-lg text-xs font-black uppercase tracking-widest">
                         Location
                       </span>
                       <h3 className="text-3xl font-bold text-white relative z-10">{day.location}</h3>
                    </div>
                    <p className="text-emerald-200/90 font-medium mb-8 text-lg leading-relaxed relative z-10">{day.desc}</p>

                    {/* Day Highlight Images (Collage style) */}
                    {day.images && day.images.length > 0 && (
                      <div className="grid grid-cols-2 gap-6 mb-10 relative z-10">
                        {day.images.map((img, i) => (
                          <div key={i} className={`relative h-56 rounded-3xl overflow-hidden shine-border shadow-xl ${i % 2 === 0 ? '-rotate-1 hover:rotate-0' : 'rotate-1 hover:rotate-0'} transition-transform duration-500`}>
                            <Image src={img} alt={`${day.location} highlight`} fill className="object-cover hover:scale-110 transition-transform duration-700" />
                            <div className="absolute inset-0 bg-gradient-to-t from-emerald-950/60 to-transparent opacity-0 hover:opacity-100 transition-opacity" />
                          </div>
                        ))}
                      </div>
                    )}

                    {/* Activities List */}
                    <div className="bg-emerald-950/40 rounded-3xl p-6 md:p-8 mb-8 border border-emerald-900/50 relative z-10">
                      <h4 className="flex items-center gap-2 text-yellow-400 font-bold uppercase tracking-widest text-sm mb-6 border-b border-emerald-800/50 pb-4">
                        <span className="text-xl">✨</span> Today&apos;s Highlights
                      </h4>
                      <ul className="space-y-4">
                        {day.activityList.map((act, i) => (
                          <motion.li 
                            whileHover={{ x: 5 }}
                            key={i} 
                            className="flex items-start gap-4 text-emerald-50 text-base"
                          >
                            <span className="flex-shrink-0 flex items-center justify-center w-6 h-6 rounded-full bg-emerald-900 border border-yellow-400/50 text-yellow-400 text-xs mt-0.5">
                              ✓
                            </span>
                            {act}
                          </motion.li>
                        ))}
                      </ul>
                    </div>

                    {/* Logistics Grid */}
                    <div className="grid grid-cols-2 lg:grid-cols-4 gap-4 relative z-10">
                      <div className="bg-emerald-900/30 p-5 rounded-2xl text-center border border-emerald-800/30 hover:border-yellow-400/30 transition-colors">
                        <span className="block text-3xl mb-3 drop-shadow-md">🏨</span>
                        <span className="block text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2">Accommodation</span>
                        <span className="text-sm text-white font-semibold">{day.accommodation}</span>
                      </div>
                      <div className="bg-emerald-900/30 p-5 rounded-2xl text-center border border-emerald-800/30 hover:border-yellow-400/30 transition-colors">
                        <span className="block text-3xl mb-3 drop-shadow-md">🍽️</span>
                        <span className="block text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2">Meal Plan</span>
                        <span className="text-sm text-white font-semibold">{day.meal}</span>
                      </div>
                      <div className="bg-emerald-900/30 p-5 rounded-2xl text-center border border-emerald-800/30 hover:border-yellow-400/30 transition-colors">
                        <span className="block text-3xl mb-3 drop-shadow-md">⏱️</span>
                        <span className="block text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2">Travel Time</span>
                        <span className="text-sm text-white font-semibold">{day.travel}</span>
                      </div>
                      <div className="bg-emerald-900/30 p-5 rounded-2xl text-center border border-emerald-800/30 hover:border-yellow-400/30 transition-colors">
                        <span className="block text-3xl mb-3 drop-shadow-md">🚙</span>
                        <span className="block text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2">Transport</span>
                        <span className="text-sm text-white font-semibold">{day.transport}</span>
                      </div>
                    </div>
                  </div>
                </motion.div>
              ))}
            </div>
          </section>
        </div>

        {/* Sticky Sidebar */}
        <aside className="relative">
          <div className="sticky top-24 glass-panel p-8 rounded-[2rem] bg-emerald-950/50 border border-yellow-400/20">
             <div className="text-center mb-8 border-b border-emerald-800/50 pb-8">
               <Image 
                 src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=256&q=80" 
                 alt="Agent" 
                 width={80} 
                 height={80} 
                 className="rounded-full mx-auto mb-4 border-2 border-yellow-400"
               />
               <h3 className="text-white font-semibold text-lg">Hello! I&apos;m Sharanie</h3>
               <p className="text-emerald-300 text-sm mt-2">Your dedicated Destination Expert. We are online 24/7. Let&apos;s plan your dream getaway!</p>
             </div>
             
             <div className="space-y-4">
               <button className="w-full bg-yellow-400 hover:bg-yellow-300 text-[#092b18] font-bold py-4 rounded-full transition-colors shadow-lg shadow-yellow-400/20">
                 Get a Quote
               </button>
               <button className="w-full border-2 border-emerald-500 hover:border-yellow-400 text-white font-bold py-4 rounded-full transition-colors flex items-center justify-center gap-2">
                 <span>💬</span> Chat Now
               </button>
               <p className="text-center text-xs text-emerald-400/70 mt-4">*Our reply time is almost instant</p>
             </div>
          </div>
        </aside>
      </div>
    </main>
  );
}
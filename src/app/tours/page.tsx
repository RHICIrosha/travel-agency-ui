import TourPackages from "@/components/TourPackages";

export default function ToursPage() {
  return (
    <main className="relative overflow-hidden min-h-screen pt-24 pb-16">
      {/* Background with slight glow */}
      <div className="absolute inset-0 bg-[#092b18]" />
      <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_rgba(34,197,94,0.1),transparent_50%)]" />
      
      <div className="relative z-10">
        <TourPackages />
      </div>
    </main>
  );
}
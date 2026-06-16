import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { createClient } from "@supabase/supabase-js";

const supabase = createClient(
  "https://xheosmgpmiqphtisxwce.supabase.co",
  "sb_publishable_7gTvQhvQc9hBGLeLf36eF0_fJ3Ix..."
);

const DashboardDriver = () => {
  const [driver, setDriver] = useState(null);
  const navigate = useNavigate();

  useEffect(() => {
    const driverId = localStorage.getItem("driver_id");
    if (!driverId) {
      navigate("/login");
      return;
    }

    supabase
      .from('drivers')
      .select('*')
      .eq('id', driverId)
      .single()
      .then(({ data, error }) => {
        if (error) {
          navigate("/login");
        } else {
          setDriver(data);
        }
      });
  }, [navigate]);

  if (!driver) {
    return <div>Loading...</div>;
  }

  return (
    <div className="p-8">
      <h1 className="text-3xl font-bold mb-4">Dashboard Driver</h1>
      <p>Nama: {driver.nama_driver}</p>
      <p>Plat: {driver.plat_nomor}</p>
      <p>Muatan: {driver.muatan_kg} kg</p>
      <button
        onClick={() => {
          localStorage.removeItem("driver_id");
          navigate("/login");
        }}
        className="bg-red-500 text-white px-4 py-2 rounded"
      >
        Logout
      </button>
    </div>
  );
};

export default DashboardDriver;

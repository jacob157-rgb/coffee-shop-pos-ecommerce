import axios from "axios";
import Alpine from "alpinejs";
import persist from "@alpinejs/persist";

// Alpine.plugin(Intersect);
Alpine.plugin(persist);
Alpine.start();

window.Alpine = Alpine;

// Init flatpickr

window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

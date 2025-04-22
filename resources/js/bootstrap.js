import 'bootstrap';
import Swal from 'sweetalert2';

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Swal = Swal;
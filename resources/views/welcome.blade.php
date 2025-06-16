<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pembuatan Surat dengan Login & Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .fade-up {
      animation: fadeUp 1s ease-out;
    }
    .modal-bg {
      background-color: rgba(0,0,0,0.6);
    }
  </style>
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-950 to-gray-900 text-gray-100 min-h-screen flex flex-col">

  <!-- Header -->
  <header class="bg-gray-900 flex justify-between items-center px-6 py-4 shadow-md">
    <div class="text-rose-400 text-2xl font-semibold">📝 BuatSurat</div>
    <div class="flex items-center space-x-6" id="userSection">
    <a href="{{ route('admin.login') }}" class="text-indigo-600 hover:underline">Login</a>
    <button id="registerBtn" class="text-rose-400 font-semibold hover:underline focus:outline-none">Daftar</button>
    </div>
  </header>

  <!-- Hero Section -->
  <main class="flex-grow flex flex-col items-center justify-center px-6">
    <div class="text-center fade-up max-w-3xl">
      <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">
        Selamat Datang di Pembuatan Surat Putri
      </h1>
      <p class="text-gray-400 mb-8 text-lg">
        Cepat. Praktis. Surat resmi langsung jadi.
      </p>
      <button id="mulaiBuatSuratBtn" 
              class="bg-rose-600 hover:bg-rose-700 text-white px-8 py-3 rounded-full text-base font-medium shadow-lg transition-all duration-300 transform hover:scale-105">
        Mulai Buat Surat
      </button>
    </div>

    <!-- Form Pembuatan Surat -->
    <section id="formSuratSection" class="w-full max-w-xl bg-gray-800 rounded-lg p-6 shadow-lg sdrdtdfgdgsguziiisususgsiusy2tyyupace-y-6 mt-12 hidden">
      <h2 class="text-4xl font-bold mb-8 text-rose-400 text-center">Form Pembuatan Surat</h2>
      <form id="suratForm" class="space-y-6">
        <div>
          <label for="namaPengirim" class="block mb-1 font-semibold">Nama Pengirim</label>
          <input type="text" id="namaPengirim" required class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white" />
        </div>
        <div>
          <label for="alamatPengirim" class="block mb-1 font-semibold">Alamat Pengirim</label>
          <input type="text" id="alamatPengirim" required class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white" />
        </div>
        <div>
          <label for="tanggalSurat" class="block mb-1 font-semibold">Tanggal Surat</label>
          <input type="date" id="tanggalSurat" required class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white" />
        </div>
        <div>
          <label for="tujuanSurat" class="block mb-1 font-semibold">Tujuan Surat</label>
          <input type="text" id="tujuanSurat" required class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white" />
        </div>
        <div>
          <label for="isiSurat" class="block mb-1 font-semibold">Isi Surat</label>
          <textarea id="isiSurat" rows="6" required class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white resize-none"></textarea>
        </div>
        <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded font-semibold w-full">
          Buat Surat
        </button>
      </form>
      <div id="hasilSurat" class="mt-12 bg-gray-900 rounded-lg p-6 shadow-lg whitespace-pre-wrap text-gray-300 hidden"></div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-400 py-4 text-center text-sm">
    &copy; 2025 BuatSurat
  </footer>

  <!-- Modal Login -->
  <div id="modalLogin" class="fixed inset-0 flex items-center justify-center hidden modal-bg z-50">
    <div class="bg-gray-800 rounded-lg w-full max-w-md p-6 relative shadow-lg">
      <button id="closeLogin" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl font-bold">&times;</button>
      <h2 class="text-2xl font-semibold mb-4 text-rose-400">Masuk ke BuatSurat</h2>
      <form id="loginForm" class="space-y-4">
        <div>
          <label for="loginusername" class="block mb-1 text-gray-300">Username</label>
          <input type="text" id="loginusername" required class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white" />
        </div>
        <div>
          <label for="loginPassword" class="block mb-1 text-gray-300">Password</label>
          <input type="password" id="loginPassword" required class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white" />
        </div>
        <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white py-2 rounded font-semibold">
          Masuk
        </button>
      </form>
    </div>
  </div>

  <!-- Modal Register -->
  <div id="modalRegister" class="fixed inset-0 flex items-center justify-center hidden modal-bg z-50">
    <div class="bg-gray-800 rounded-lg w-full max-w-md p-6 relative shadow-lg">
      <button id="closeRegister" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl font-bold">&times;</button>
      <h2 class="text-2xl font-semibold mb-4 text-rose-400">Daftar BuatSurat</h2>
      <form id="registerForm" class="space-y-4">
        <div>
          <label for="registerName" class="block mb-1 text-gray-300">Nama Lengkap</label>
          <input type="text" id="registerName" required class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white" />
        </div>
        <div>
          <label for="registerEmail" class="block mb-1 text-gray-300">Username</label>
          <input type="text" id="registerEmail" required class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white" />
        </div>
        <div>
          <label for="registerPassword" class="block mb-1 text-gray-300">Password</label>
          <input type="password" id="registerPassword" required class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white" />
        </div>
        <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white py-2 rounded font-semibold">
          Daftar
        </button>
      </form>
    </div>
  </div>

  <script>
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const modalLogin = document.getElementById('modalLogin');
    const modalRegister = document.getElementById('modalRegister');
    const closeLogin = document.getElementById('closeLogin');
    const closeRegister = document.getElementById('closeRegister');

    loginBtn.addEventListener('click', () => modalLogin.classList.remove('hidden'));
    registerBtn.addEventListener('click', () => modalRegister.classList.remove('hidden'));
    closeLogin.addEventListener('click', () => modalLogin.classList.add('hidden'));
    closeRegister.addEventListener('click', () => modalRegister.classList.add('hidden'));

    // Register
    document.getElementById('registerForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const user = {
        name: document.getElementById('registerName').value,
        username: document.getElementById('registerEmail').value,
        password: document.getElementById('registerPassword').value
      };
      localStorage.setItem('userData', JSON.stringify(user));
      alert('Pendaftaran berhasil! Silakan login.');
      modalRegister.classList.add('hidden');
    });

    // Login
    document.getElementById('loginForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const username = document.getElementById('loginusername').value;
      const password = document.getElementById('loginPassword').value;
      const storedUser = JSON.parse(localStorage.getItem('userData'));

      if (storedUser && username === storedUser.username && password === storedUser.password) {
        localStorage.setItem('isLoggedIn', 'true');
        updateLoginUI();
        modalLogin.classList.add('hidden');
      } else {
        alert('Login gagal. Coba lagi.');
      }
    });

    function updateLoginUI() {
      const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
      const userData = JSON.parse(localStorage.getItem('userData'));
      const userSection = document.getElementById('userSection');
      if (isLoggedIn && userData) {
        userSection.innerHTML = `👤 ${userData.name} <button id="logoutBtn" class="text-rose-400 font-semibold hover:underline">Logout</button>`;
        document.getElementById('logoutBtn').addEventListener('click', () => {
          localStorage.setItem('isLoggedIn', 'false');
          updateLoginUI();
        });
      } else {
        userSection.innerHTML = `
          <button id="loginBtn" class="text-rose-400 font-semibold hover:underline">Masuk</button>
          <button id="registerBtn" class="text-rose-400 font-semibold hover:underline">Daftar</button>`;
        document.getElementById('loginBtn').addEventListener('click', () => modalLogin.classList.remove('hidden'));
        document.getElementById('registerBtn').addEventListener('click', () => modalRegister.classList.remove('hidden'));
      }
    }

    updateLoginUI();

    document.getElementById('mulaiBuatSuratBtn').addEventListener('click', () => {
      if (localStorage.getItem('isLoggedIn') !== 'true') {
        alert('Silakan login terlebih dahulu.');
        return;
      }
      const formSuratSection = document.getElementById('formSuratSection');
      formSuratSection.classList.toggle('hidden');
      if (!formSuratSection.classList.contains('hidden')) {
        formSuratSection.scrollIntoView({ behavior: 'smooth' });
      }
    });

    document.getElementById('suratForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const nama = document.getElementById('namaPengirim').value;
      const alamat = document.getElementById('alamatPengirim').value;
      const tanggal = document.getElementById('tanggalSurat').value;
      const tujuan = document.getElementById('tujuanSurat').value;
      const isi = document.getElementById('isiSurat').value;

      const tanggalFormatted = new Date(tanggal).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' });
      const hasil = `${tanggalFormatted}

Kepada Yth.
${tujuan}

Dengan hormat,

${isi}

Hormat saya,

${nama}
${alamat}`;

      const hasilSurat = document.getElementById('hasilSurat');
      hasilSurat.textContent = hasil;
      hasilSurat.classList.remove('hidden');
      hasilSurat.scrollIntoView({ behavior: 'smooth' });
    });
  </script>
</body>
</html>

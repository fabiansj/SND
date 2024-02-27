@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/contact.jpg') }}" alt="">
    </div>
    <!-- Contact Section Start -->
    <section class="contact" id="contact">
        <h2><span>Kontak</span> Kami</h2>        
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.099325122615!2d107.5647087!3d-6.887629!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e42d237a796b%3A0x69aee5fd1ac398c2!2sSND%20Racing!5e0!3m2!1sid!2sid!4v1703272885460!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="nama">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="No Hp">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="pesan anda">
                </div>
                <button type="submit" class="btn" onclick="sendWAMessage()">Kirim Pesan</button>
            </form>
        </div>
    </section>
    <!-- Contact Section End -->
    <!-- <script>
    function sendWAMessage() {
    //   event.preventDefault(); // Mencegah pengiriman formulir secara default
      
      var nama = document.getElementById('nama').value;
      var no_hp = document.getElementById('no_hp').value;
      var pesan = document.getElementById('pesan').value;

      // Membuat URL dengan skema WhatsApp
      var urlWhatsApp = 'https://wa.me/' + no_hp + '?text=' + encodeURIComponent('Halo admin snd saya' + nama + ', ' + pesan);

      // Mengarahkan pengguna ke aplikasi WhatsApp
      window.location.href = urlWhatsApp;
    }
  </script> -->
@endsection

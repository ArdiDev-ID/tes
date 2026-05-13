(function () {
  var d = document;
  var button = d.getElementById('mobileMenuButton');
  var closeButton = d.getElementById('mobileMenuClose');
  var drawer = d.getElementById('mobileDrawer');
  var overlay = d.getElementById('mobileDrawerOverlay');

  function openDrawer() {
    if (!overlay || !drawer) return;
    overlay.classList.remove('hidden');
    drawer.classList.remove('translate-x-full');
    d.body.classList.add('overflow-hidden');
  }

  function closeDrawer() {
    if (!overlay || !drawer) return;
    overlay.classList.add('hidden');
    drawer.classList.add('translate-x-full');
    d.body.classList.remove('overflow-hidden');
  }

  if (button && closeButton && drawer && overlay) {
    button.addEventListener('click', openDrawer);
    closeButton.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);
    d.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') closeDrawer();
    });
  }

  d.addEventListener('click', function (event) {
    var trigger = event.target.closest('[data-confirm]');
    if (!trigger) return;
    event.preventDefault();
    var text = trigger.getAttribute('data-confirm') || 'Lanjutkan aksi ini?';
    if (window.Swal) {
      window.Swal.fire({
        title: 'Konfirmasi',
        text: text,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, lanjut',
        cancelButtonText: 'Batal'
      }).then(function (result) {
        if (result.isConfirmed && trigger.href) window.location.href = trigger.href;
      });
    } else if (confirm(text) && trigger.href) {
      window.location.href = trigger.href;
    }
  });

  var flash = d.querySelector('[data-flash-message]');
  if (flash && window.Swal) {
    window.Swal.fire({
      toast: true,
      position: 'top-end',
      icon: flash.getAttribute('data-flash-type') || 'success',
      title: flash.getAttribute('data-flash-message') || 'Berhasil',
      showConfirmButton: false,
      timer: 2200
    });
  }
})();

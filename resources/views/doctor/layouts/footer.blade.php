  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Tüm Hakları Saklıdır.
    </div>
    <strong>Copyright &copy; 2020 {{ config('app.name', 'TELETIP') }}</strong>
  </footer>
</div>

<script type='text/javascript'>
  var url = window.location;
  const allLinks = document.querySelectorAll('.nav-item a');
  const currentLink = [...allLinks].filter(e => {
    return e.href == url;
  });

  currentLink[0].classList.add("active");
  currentLink[0].closest(".has-treeview").classList.add("menu-open");
</script>

<!-- REQUIRED SCRIPTS -->
<script src="{{asset('/')}}plugins/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}dist/js/adminlte.min.js"></script>
@if ((isset($show_date) && $show_date) || (isset($show_birthdate) && $show_birthdate))
<script src='{{asset('/')}}plugins/moment/moment.min.js'></script>
<script src='{{asset('/')}}plugins/daterangepicker/daterangepicker.js'></script>
@if (isset($show_date) && $show_date)
<script type='text/javascript'>
	$(function() {
		$('#inputAppointmentDate').daterangepicker({
			'singleDatePicker': true,
			'timePicker': true,
			'timePicker24Hour': true,
			'timePickerIncrement': 15,
			'locale': {
				'format': 'YYYY-MM-DD HH:mm',
				'applyLabel': 'Uygula',
				'cancelLabel': 'Vazgeç',
				'daysOfWeek': ['Paz','Pzt','Sal','Çar','Per','Cum','Cmt'],
				'monthNames': ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
				'firstDay': 1
			}
		});
	});
</script>
@endif
@if (isset($show_birthdate) && $show_birthdate)
<script type='text/javascript'>
	$(function() {
		$('#inputBirthDate').daterangepicker({
			'singleDatePicker': true,
			'locale': {
				'format': 'YYYY-MM-DD',
				'applyLabel': 'Uygula',
				'cancelLabel': 'Vazgeç',
				'daysOfWeek': ['Paz','Pzt','Sal','Çar','Per','Cum','Cmt'],
				'monthNames': ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
				'firstDay': 1
			}
		});
	});
</script>
@endif
@endif
@yield('end')
</body>
</html>

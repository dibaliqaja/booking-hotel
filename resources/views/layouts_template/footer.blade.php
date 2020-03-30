        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2020
            </div>
            <div class="footer-right"></div>
        </footer>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deleteForm">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure?</p>
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <form id="delete-form" method="post">
                @csrf
                @method('delete')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="btn-delete" id="btn-delete" class="btn btn-danger">Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
    $(document).ready(function () {

        $(document).on('click', '.deleteHotel', function(){
            var id = $(this).attr('delete_value');
            var a = $("#delete-form").attr("action", "../hotel/" + id);
            $('#deleteForm').modal();
        });

        $('#hotel-table').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('hotel.index') }}",
            },
            columns: [
                { data: 'DT_RowIndex', searchable: false },
                { data: 'name', name: 'name' },
                { data: 'address', name: 'address' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $(document).on('click', '.deleteRoom', function(){
            var id = $(this).attr('delete_value');
            var a = $("#delete-form").attr("action", "../room/" + id);
            $('#deleteForm').modal();
        });

        $('#room-table').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('room.index') }}",
            },
            columns: [
                { data: 'DT_RowIndex', searchable: false },
                { data: 'name', name: 'name' },
                { data: 'quantity', name: 'quantity' },
                { data: 'price', name: 'price', render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp ' ) },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>

</body>
</html>

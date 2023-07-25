@push('scripts')
    <script src="{{Module::asset('admin:plugins/select2/dist/js/select2.min.js')}}"></script>
    <script>
        $('#property-locations').select2({
            multiple: true,
        });
    </script>

    <script>
        $('#property-infrastructures').select2({
            multiple: true,
        });
    </script>

    <script>
        $('#property-leisures').select2({
            multiple: true,
        });
    </script>

    <script>
        $('#property-additionals').select2({
            multiple: true,
        });
    </script>

    <script>
        $('#property-labels').select2({
            multiple: true,
        });
    </script>
@endpush

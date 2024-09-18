<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Card Section -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    <p>Welcome to your dashboard.</p>
                </div>
            </div>
        </div>

        <!-- DataTable Section -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Quotes
                </div>
                <div class="card-body">
                    <table id="quotes-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Title</th>
                                <th>Color</th>
                                <th>Thumbnail</th>
                                <th>Amount</th>
                                <th>Published</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#quotes-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('quotes.data') }}',
            columns: [
                { data: 'user_id', name: 'user_id' },
                { data: 'title', name: 'title' },
                { data: 'color', name: 'color', orderable: false, searchable: false },
                { data: 'thumbnail', name: 'thumbnail', orderable: false, searchable: false },
                { data: 'amount', name: 'amount' },
                { data: 'published', name: 'published' }
            ]
        });
    });
</script>
@endpush

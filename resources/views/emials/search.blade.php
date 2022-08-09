<form action="{{ route('emails.store') }}" method="GET" class="card card-body p-4 mx-4">
    @csrf
    <textarea name="emails" rows="10" cols="90" placeholder="Enter emails by comma separated"></textarea>
    <br />
    <br />
    <button type="submit">Submit</button>
</form>
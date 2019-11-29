<tr>
    <td>{{ $feedback->email }}</td>
    <td>{{ $feedback->message }}</td>
    <td>{{ \Carbon\Carbon::parse($feedback->created_at)->format('d-m-Y | h:i') }}</td>
</tr>
<p> {{ $user->name}} has registered via Site. </p>

<p> <b> Name: {{ $user->name }} </b> </p>
<p> <b> Email: {{ $user->email }} </b> </p>
<p> <b> Phone: {{ $user->phone }} </b> </p>

<p> <a href="{{ URL::route('index') }}">logistiQuote Team</a> </p>

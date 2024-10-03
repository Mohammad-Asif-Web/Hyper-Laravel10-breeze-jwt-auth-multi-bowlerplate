
<h1>This is home</h1>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" style="border: 0; background:#000; color: #fff;padding: 10px;cursor: pointer;">
        <span class="menu-title">Sign Out</span>
    </button>
</form>




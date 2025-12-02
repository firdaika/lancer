<form action="{{ route('logout') }}" method="POST" style="width: 100%;">
    @csrf
    <button type="submit" 
        style="
            width: 100%;
            color: white;
            text-decoration: none;
            padding: 15px 25px;
            display: block;
            background-color: transparent;
            border: none;
            text-align: left;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            font-weight: 500;
        "
        onmouseover="this.style.backgroundColor='#001B50'"
        onmouseout="this.style.backgroundColor='transparent'"
    >
        Logout
    </button>
</form>
<form action="{{ route('set_language_locale', $lang) }}" method="POST" class="dropdown">
  @csrf
  <button class=" d-flex justify-content-center btn lenguages" type="submit">
      <span class="btn-lingue nav-link ">{{ $nation }}</span>
  </button>
</form>
<form class="button" method="POST" action=" {{ $action }} " >
    @method('DELETE')
    @csrf
    <input type="submit" value="DELETE">
 </form>
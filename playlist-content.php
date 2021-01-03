<div class="content">
	<h1 style="color: white; margin-top: 70px;">Your Playlists</h1>
	<button type="button" data-bs-toggle="modal" data-bs-target="#addModal" style="padding: 10px; border-radius: 30px;" title="Add Playlist">
		<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
		</svg>
	</button>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter your playlist name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form>
      <div class="modal-body">
			<table align="center">
				<tr>
					<td>
						<input class="form-control" type="text" placeholder="Playlist's Name">
					</td>
				</tr>
			</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Save</button>
      </div>
	 </form>
    </div>
  </div>
</div>
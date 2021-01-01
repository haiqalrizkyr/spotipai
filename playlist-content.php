<div class="content">
	<h1 style="color: white; margin-top: 70px;">Your Playlists</h1>
	<button type="button" data-toggle="modal" data-target="#PlaylistModalCenter" style="padding: 10px; border-radius: 30px;" title="Add Playlist"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
		</svg></button>
</div>
<!-- Modal -->
<div class="modal fade" id="PlaylistModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Enter your playlist name</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<table align="center">
						<tr>
							<td><input type="text"></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-outline-success">Save</button>
			</div>
		</div>
	</div>
</div>
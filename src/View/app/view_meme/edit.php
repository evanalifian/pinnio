<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h2>Edit Meme</h2>

      <form action="/update-meme" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description"
            rows="4"><?php echo htmlspecialchars($meme['description'] ?? ''); ?></textarea>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">Update Meme</button>
        </div>
      </form>
    </div>
  </div>
</div>
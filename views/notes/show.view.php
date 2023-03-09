<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<a href="/notes" class="text-blue-500 underline">Go to notes page</a>
		<p>
			<?= $note['body'] ?>
		</p>
		<div class="flex gap-x-2">
			<a href="/note/edit?id=<?= $note['id'] ?>" class="text-white bg-gray-500 py-2 px-4 rounded mt-2 block w-fit">Edit</a>
			<form method="POST" class="mt-2">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="id" value="<?= $note['id'] ?>">
				<button class="bg-red-500 text-white py-2 px-4 rounded">Delete</button>
			</form>
		</div>
	</div>
</main>

<?php require base_path('views/partials/footer.php') ?>
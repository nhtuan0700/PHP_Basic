<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<div>
			<div class="md:grid md:grid-cols-3 md:gap-6">
				<div class="mt-5 md:col-span-2 md:mt-0">
					<form action="/note/edit" method="POST">
						<input type="hidden" name="_method" value="PATCH">
						<input type="hidden" name="id" value="<?= $note['id'] ?>">
						<div class="shadow sm:overflow-hidden sm:rounded-md">
							<div class="space-y-6 bg-white px-4 py-5 sm:p-6">
								<div>
									<label for="about" class="block text-sm font-medium text-gray-700">Body</label>
									<div class="mt-1">
										<textarea id="body" name="body" rows="3" class="p-2 mt-1 block w-full border-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"><?= $note['body'] ?></textarea>
									</div>
									<?php if (isset($errors['body'])) : ?>
										<p class="text-red-600 text-sm mt-1"><?= $errors['body'] ?></p>
									<?php endif; ?>
								</div>
							</div>
							<div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex justify-end gap-x-2">
								<a href="/note?id=<?= $note['id'] ?>" class="text-white bg-gray-500 py-2 px-4 rounded block w-fit">Cancel</a>
								<button type="submit" class="rounded-md border border-transparent bg-indigo-600 py-2 px-4 font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>

<?php require base_path('views/partials/footer.php') ?>
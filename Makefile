deploy:
	ssh yakko "cd ./keepwinging.com/; git clean -f"
	ssh yakko ./keepwinging.com/symfony project:disable prod frontend
	ssh yakko "cd ./keepwinging.com/; git pull --rebase origin master"
	ssh yakko ./keepwinging.com/symfony project:enable prod frontend
	ssh yakko ./keepwinging.com/symfony project:permissions
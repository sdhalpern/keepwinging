deploy:
	ssh yakko "cd ./keepwinging.com/; git clean -f; git reset --hard"
	ssh yakko ./keepwinging.com/symfony project:disable prod frontend
	ssh yakko "cd ./keepwinging.com/; git pull --rebase origin master"
	ssh yakko "rm -rf ./keepwinging.com/cache/*"
	ssh yakko "rm -rf ./keepwinging.com/log/*"
	ssh yakko ./keepwinging.com/symfony project:permissions
	ssh yakko ./keepwinging.com/symfony project:enable prod frontend

provision_db:
	ssh yakko "./keepwinging.com/symfony propel:build-all-load --env=prod"
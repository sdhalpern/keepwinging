provision:
	ssh yakko git clone git@github.com:grahamc/keepwinging.git /home/itrebal/keepwinging.com/

lock:
	ssh yakko ./keepwinging.com/symfony project:disable prod frontend

unlock:
	ssh yakko ./keepwinging.com/symfony project:enable prod frontend

deploy: lock
	ssh yakko "cd ./keepwinging.com/; git pull --rebase origin master"
	unlock
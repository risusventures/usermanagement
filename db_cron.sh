#!/bin/sh

# Guide by(for) Arvind XP
# to create a cronjob in linux use crontab
# to list all the cron for current linux user ->  crontab -l
# to start -> crontab -e
# now add the cron job -> A B C D E /path/to/script.sh
# A = Min, B = Hour, C = Day, D = Month, E = Day of the Week


mkdir -p risus_usermanagemet_db_backup
mysqldump --set-gtid-purged=OFF -h risus-usermanagment.cnna5vf2pbcc.eu-north-1.rds.amazonaws.com -u admin -pCSO7YR55N3sNoH2e05TvcVbT3KlYws usermanagement > risus_usermanagemet_db_backup/`date "+%Y_%m_%d__%H_%I_%M_%S"`.sql

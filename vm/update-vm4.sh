#
# cp jenkins-jobs
#  - checkout crm
# ------------------------------
JOB_DIR=/var/lib/jenkins/jobs

function copy_job
{
JOB="$1"
mkdir $JOB_DIR/$JOB
cp $JOB/config.xml $JOB_DIR/$JOB
chown -R jenkins:jenkins $JOB_DIR/$JOB
}
cd jenkins/jobs

copy_job check-crm-developer
copy_job daily-crm-integration
copy_job auto-crm-integration
copy_job test-crm-staging
copy_job test-crm-testing
copy_job deploy-crm-staging
copy_job deploy-crm-testing

service jenkins restart

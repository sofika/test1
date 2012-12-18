set -xv 
# -------------------------------------------------------
# jenkins 
# -------------------------------------------------------
service jenkins start
sleep 15
cd /usr/lib/jenkins/
sudo wget http://localhost:8080/jnlpJars/jenkins-cli.jar
java -jar /usr/lib/jenkins/jenkins-cli.jar -s http://localhost:8080 install-plugin http://updates.jenkins-ci.org/download/plugins/AdaptivePlugin/0.1/AdaptivePlugin.hpi
JSCLI="java -jar /usr/lib/jenkins/jenkins-cli.jar -s http://localhost:8080"
$JSCLI install-plugin checkstyle
$JSCLI install-plugin cloverphp
$JSCLI install-plugin dry
$JSCLI install-plugin htmlpublisher
$JSCLI install-plugin jdepend
$JSCLI install-plugin plot
$JSCLI install-plugin pmd
$JSCLI install-plugin violations
$JSCLI install-plugin xunit
$JSCLI install-plugin git
$JSCLI install-plugin greenballs
$JSCLI install-plugin git-server
$JSCLI install-plugin ghprb
$JSCLI install-plugin embeddable-build-status
$JSCLI install-plugin ssh
$JSCLI install-plugin publish-over-ssh
$JSCLI install-plugin email-ext
$JSCLI install-plugin robot
$JSCLI safe-restart

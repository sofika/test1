set -xv 
yum -y install vim
pear install --alldeps pear.phpunit.de/PHPUnit
pear install phpunit/ppw
pear channel-discover pear.pdepend.org
pear install pear.pdepend.org/PHP_Depend
pear install pear.pdepend.org/PHP_CodeSniffer_Standards_PDepend2
pear channel-discover pear.phpmd.org
pear install pear.phpmd.org/PHP_PMD
pear install pear.phpunit.de/phpcpd
pear install -a PHPDocumentor
pear install -a phpunit/PHP_CodeBrowser
pear install -a phpunit/phploc
pecl install Xdebug
yum -y install ant
yum -y install wget
wget -O /etc/yum.repos.d/jenkins.repo http://pkg.jenkins-ci.org/redhat/jenkins.repo
rpm --import http://pkg.jenkins-ci.org/redhat/jenkins-ci.org.key
yum -y install jenkins
#--------------------------------------------------------------
# python and robot-installation
#--------------------------------------------------------------
yum -y groupinstall 'Development Tools'
yum -y install openssl-devel* ncurses-devel* zlib*.x86_64
yum -y install bzip2 bzip2-devel bzip2-libs
yum -y install dejavu-sans-fonts
curl -O http://python.org/ftp/python/2.7/Python-2.7.tgz
tar xfz Python-2.7.tgz
cd Python-2.7
./configure
make
make install
which python
python -V
#-----------------------------------------------------------------
curl -O http://pypi.python.org/packages/2.7/s/setuptools/setuptools-0.6c11-py2.7.egg
chmod 775 setuptools-0.6c11-py2.7.egg
sh setuptools-0.6c11-py2.7.egg
curl -O http://pypi.python.org/packages/source/p/pip/pip-1.0.tar.gz
tar xvfz pip-1.0.tar.gz
cd pip-1.0
python setup.py install
pip install robotframework
#-----------------------------------------------------------------
usermod -G "apache,developer" jenkins
usermod -G "jenkins" apache
usermod -G "jenkins" developer
echo "PATH=/usr/local/bin:$PATH" >> /etc/sysconfig/jenkins
mv /var/www/testing.reef.7p-group.local/htdocs/reef/ /var/www/testing.reef.7p-group.local/htdocs/reef-orig-sav

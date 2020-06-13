# Elsticsearch
# 先安装JAVa 环境 
# wget https://repo.huaweicloud.com/java/jdk/8u201-b09/jdk-8u201-linux-x64.tar.gz
# tar -zxvf jdk-8u201-linux-x64.tar.gz 
# mv jdk1.8.0_201 /usr/local/jdk1.8/
# vim /etc/profile
# 最后一行添加如下配置
# export JAVA_HOME=/usr/local/jdk1.8
# export PATH=$JAVA_HOME/bin:$PATH
# export CLASSPATH=.:$JAVA_HOME/lib/dt.jar:$JAVA_HOME/lib/tools.jar

# 更新配置 source /etc/profile
# 3.查看是否安装成功
# java -version

Elsticsearch
#  启动 
sh ./bin/elasticsearch 
修改外部可访问

cluster.initial_master_nodes: ["node-1"]

network.host: 0.0.0.0

vi /etc/sysctl.conf

vm.max_map_count=262144

sysctl -p

解决9200端口了:

vim /etc/sysconfig/iptables

-A INPUT -m state --state NEW -m tcp -p tcp --dport 9200 -j ACCEPT

重启防火墙：

service iptables restart


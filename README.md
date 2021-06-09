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
elsticsearch 默认不能同ROOt用户启动
先创建一个新的用户 比如yh 然后给这个用户当前文件目录的可执行权限
adduser yh 
# 设置密码 passwd yh
# chown -R yh:yh elasticsearch-6.4.1
# 启动 sh ./bin/elasticsearch 
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

elasticsearch.xml 的配置 xpack.ml.enabled: false
# network.host: 0.0.0.0
# bootstrap.memory_lock: false
# bootstrap.system_call_filter: false
# http.cors.enabled: true
# http.cors.allow-origin: "*"

elasticsearch 集群部署
cluster.name: swool
node.name: swool_1
node.master: true

//一下是分机器的设置
cluster.name: swool
node.name: swool_2
node.master: false

discovery.zen.ping.unicast.hosts: ["127.0.0.1"]



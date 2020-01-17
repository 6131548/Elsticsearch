# Elsticsearch
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


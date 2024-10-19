<?php

declare(strict_types=1);

$_ENV['V2RayJson_Config'] = [
    'log' => [
        'error' => [
            'level' => 'error',
            'type' => 'console',
        ],
        'access' => [
            'type' => 'none',
        ],
    ],
    'dns' => [
        'nameServer' => [
            [
                'address' => '1.1.1.1',
            ],
            [
                'address' => '1.0.0.1',
            ],
        ],
    ],
    'inbounds' => [
        [
            'protocol' => 'socks',
            'settings' => [
                'udpEnabled' => true,
                'address' => '127.0.0.1',
                'packetEncoding' => 'packet',
            ],
            'port' => 7892,
            'listen' => '127.0.0.1',
        ],
        [
            'protocol' => 'http',
            'settings' => [],
            'port' => 7893,
            'listen' => '127.0.0.1',
        ],
    ],
    'outbounds' => [],
];

$_ENV['SingBox_Config'] = [
    'outbounds' => [
        [
            'tag' => 'select',
            'type' => 'selector',
            'default' => 'auto',
            'outbounds' => [
            'interrupt_exist_connections' => false,
                'auto',
            ],
        ],
        [
            'tag' => 'auto',
            'type' => 'urltest',
            'outbounds' => [],
            'url' => 'https://cp.cloudflare.com/generate_204',
            'interval' => '3m',
            'tolerance' => 50,
            'idle_timeout' => '30m',
            'interrupt_exist_connections' => false,
        ],
    ],
];

$_ENV['Clash_Config'] = [
    'port' => 7890,
    'socks-port' => 7891,
    'allow-lan' => false,
    'mode' => 'Rule',
    'ipv6' => true,
    'log-level' => 'error',
    'tcp-concurrent' => $_ENV['tcp_concurrent'],
    'external-controller' => '0.0.0.0:9091',
];

// Clash group indexes to be inserted node names
$_ENV['Clash_Group_Indexes'] = [0, 1, 2, 4, 6, 7, 8, 11];

$_ENV['Clash_Group_Config'] = [
    'proxy-groups' => [
        [
            'name' => '🔰 手动选择',
            'type' => 'select',
            // 插入节点名称
            'proxies' => [
                '♻️ 自动选择',
                '🎯 Direct',
            ],
        ],
        [
            'name' => '♻️ 自动选择',
            'type' => 'url-test',
            'url' => 'http://cp.cloudflare.com/generate_204',
            'interval' => 300,
            // 插入节点名称
            'proxies' => [
            ],
        ],
        [
            'name' => '🎥 Netflix',
            'type' => 'select',
            // 插入节点名称
            'proxies' => [
                '🔰 手动选择',
                '♻️ 自动选择',
                '🎯 Direct',
            ],
        ],
        [
            'name' => '⛔️ 广告拦截',
            'type' => 'select',
            'proxies' => [
                '🛑 Block',
                '🎯 Direct',
                '🔰 手动选择',
            ],
        ],
        [
            'name' => '🌍 主流媒体',
            'type' => 'select',
            // 插入节点名称
            'proxies' => [
                '🔰 手动选择',
                '♻️ 自动选择',
                '🎯 Direct',
            ],
        ],
        [
            'name' => '🇨🇳 中国媒体',
            'type' => 'select',
            'proxies' => [
                '🎯 Direct',
                '🔰 手动选择',
                '♻️ 自动选择',
            ],
        ],
        [
            'name' => 'Ⓜ️ Microsoft',
            'type' => 'select',
            // 插入节点名称
            'proxies' => [
                '🎯 Direct',
                '🔰 手动选择',
                '♻️ 自动选择',
            ],
        ],
        [
            'name' => '📲 Telegram',
            'type' => 'select',
            // 插入节点名称
            'proxies' => [
                '🔰 手动选择',
                '♻️ 自动选择',
                '🎯 Direct',
            ],
        ],
        [
            'name' => '🍎 Apple',
            'type' => 'select',
            // 插入节点名称
            'proxies' => [
                '🔰 手动选择',
                '♻️ 自动选择',
                '🎯 Direct',
            ],
        ],
        [
            'name' => '🎯 Direct',
            'type' => 'select',
            'proxies' => [
                'DIRECT',
            ],
        ],
        [
            'name' => '🛑 Block',
            'type' => 'select',
            'proxies' => [
                'REJECT',
            ],
        ],
        [
            'name' => '🐟 漏网之鱼',
            'type' => 'select',
            // 插入节点名称
            'proxies' => [
                '🔰 手动选择',
                '♻️ 自动选择',
                '🎯 Direct',
            ],
        ],
    ],
    'rules' => [
        // 全球直连
        'DOMAIN-KEYWORD,Thunder,🎯 Direct',
        'DOMAIN-KEYWORD,XLLiveUD,🎯 Direct',
        'DOMAIN-KEYWORD,aria2,🎯 Direct',
        'DOMAIN-KEYWORD,miner,🎯 Direct',
        'DOMAIN-KEYWORD,mining,🎯 Direct',
        'DOMAIN-KEYWORD,monero,🎯 Direct',
        'DOMAIN-KEYWORD,pool,🎯 Direct',
        'DOMAIN-KEYWORD,xmr,🎯 Direct',
        'DOMAIN-KEYWORD,xunlei,🎯 Direct',
        'DOMAIN-KEYWORD,yunpan,🎯 Direct',
        'DST-PORT,10300,🎯 Direct',
        'DST-PORT,10343,🎯 Direct',
        'DST-PORT,18080,🎯 Direct',
        'DST-PORT,2222,🎯 Direct',
        'DST-PORT,3333,🎯 Direct',
        'DST-PORT,5555,🎯 Direct',
        'DST-PORT,7777,🎯 Direct',
        'DST-PORT,8333,🎯 Direct',
        'DST-PORT,8888,🎯 Direct',
        'DST-PORT,9000,🎯 Direct',
        'DST-PORT,9999,🎯 Direct',
        'GEOIP,cn,🎯 Direct',
        'GEOIP,private,🎯 Direct,no-resolve',
        'GEOSITE,cn,🎯 Direct',
        'PROCESS-NAME,DownloadService,🎯 Direct',
        'PROCESS-NAME,Folx,🎯 Direct',
        'PROCESS-NAME,Motrix,🎯 Direct',
        'PROCESS-NAME,NetTransport,🎯 Direct',
        'PROCESS-NAME,Thunder,🎯 Direct',
        'PROCESS-NAME,Transmission,🎯 Direct',
        'PROCESS-NAME,WebTorrent Helper,🎯 Direct',
        'PROCESS-NAME,WebTorrent,🎯 Direct',
        'PROCESS-NAME,Weiyun,🎯 Direct',
        'PROCESS-NAME,aria2c,🎯 Direct',
        'PROCESS-NAME,fdm,🎯 Direct',
        'PROCESS-NAME,qbittorrent,🎯 Direct',
        'PROCESS-NAME,uTorrent,🎯 Direct',
        // Microsoft
        'GEOSITE,microsoft,Ⓜ️ Microsoft',
        // Apple
        'GEOSITE,apple,🍎 Apple',
        // Telegram
        'GEOIP,telegram,📲 Telegram',
        'GEOSITE,telegram,📲 Telegram',
        // Netflix
        'GEOIP,netflix,🎥 Netflix',
        'GEOSITE,netflix,🎥 Netflix',
        // 国外媒体
        'GEOSITE,category-media,🌍 主流媒体',
        // 中国媒体
        'GEOSITE,category-media-cn,🇨🇳 中国媒体',
        // 广告拦截
        'GEOIP,ad,⛔️ 广告拦截',
        'GEOSITE,category-ads-all,⛔️ 广告拦截',
        // :)
        // https://github.com/hoshsadiq/adblock-nocoin-list
        'DOMAIN-SUFFIX,1q2w3.fun,🛑 Block',
        'DOMAIN-SUFFIX,abc.pema.cl,🛑 Block',
        'DOMAIN-SUFFIX,acbp0020171456.page.tl,🛑 Block',
        'DOMAIN-SUFFIX,ad-miner.com,🛑 Block',
        'DOMAIN-SUFFIX,adminer.com,🛑 Block',
        'DOMAIN-SUFFIX,aeros01.tk,🛑 Block',
        'DOMAIN-SUFFIX,aeros02.tk,🛑 Block',
        'DOMAIN-SUFFIX,aeros11.tk,🛑 Block',
        'DOMAIN-SUFFIX,aeros12.tk,🛑 Block',
        'DOMAIN-SUFFIX,afminer.com,🛑 Block',
        'DOMAIN-SUFFIX,analytics.blue,🛑 Block',
        'DOMAIN-SUFFIX,andlache.com,🛑 Block',
        'DOMAIN-SUFFIX,anybest.pw,🛑 Block',
        'DOMAIN-SUFFIX,api.browsermine.com,🛑 Block',
        'DOMAIN-SUFFIX,api.inwemo.com,🛑 Block',
        'DOMAIN-SUFFIX,api.miner.beeppool.org,🛑 Block',
        'DOMAIN-SUFFIX,as.cfcdist.loan,🛑 Block',
        'DOMAIN-SUFFIX,ashgrrwt.click,🛑 Block',
        'DOMAIN-SUFFIX,authedmine.com,🛑 Block',
        'DOMAIN-SUFFIX,authedmine.eu,🛑 Block',
        'DOMAIN-SUFFIX,authedwebmine.cz,🛑 Block',
        'DOMAIN-SUFFIX,autologica.ga,🛑 Block',
        'DOMAIN-SUFFIX,axoncoho.tk,🛑 Block',
        'DOMAIN-SUFFIX,bablace.com,🛑 Block',
        'DOMAIN-SUFFIX,bafybeidravcab5p3acvthxtwosm4rfpl4yypwwm52s7sazgxaezfzn5xn4.ipfs.infura-ipfs.io,🛑 Block',
        'DOMAIN-SUFFIX,baiduccdn1.com,🛑 Block',
        'DOMAIN-SUFFIX,becanium.com,🛑 Block',
        'DOMAIN-SUFFIX,berateveng.ru,🛑 Block',
        'DOMAIN-SUFFIX,besocial.online,🛑 Block',
        'DOMAIN-SUFFIX,bestcoinsignals.com,🛑 Block',
        'DOMAIN-SUFFIX,besti.ga,🛑 Block',
        'DOMAIN-SUFFIX,bestsrv.de,🛑 Block',
        'DOMAIN-SUFFIX,bewaslac.com,🛑 Block',
        'DOMAIN-SUFFIX,biberukalap.com,🛑 Block',
        'DOMAIN-SUFFIX,binarybusiness.de,🛑 Block',
        'DOMAIN-SUFFIX,bitcoin-cashcard.com,🛑 Block',
        'DOMAIN-SUFFIX,bitcoin-cashcard.de,🛑 Block',
        'DOMAIN-SUFFIX,bitcoin-cashcard.eu,🛑 Block',
        'DOMAIN-SUFFIX,bitcoin-pay.eu,🛑 Block',
        'DOMAIN-SUFFIX,bitcoin-pocket.de,🛑 Block',
        'DOMAIN-SUFFIX,bitcoin-pocket.eu,🛑 Block',
        'DOMAIN-SUFFIX,bmcm.ml,🛑 Block',
        'DOMAIN-SUFFIX,bmcm.pw,🛑 Block',
        'DOMAIN-SUFFIX,bmnr.pw,🛑 Block',
        'DOMAIN-SUFFIX,bmst.pw,🛑 Block',
        'DOMAIN-SUFFIX,brominer.com,🛑 Block',
        'DOMAIN-SUFFIX,browsermine.com,🛑 Block',
        'DOMAIN-SUFFIX,candid.zone,🛑 Block',
        'DOMAIN-SUFFIX,cashbeet.com,🛑 Block',
        'DOMAIN-SUFFIX,cdn.adless.io,🛑 Block',
        'DOMAIN-SUFFIX,cdn.cloudcoins.co,🛑 Block',
        'DOMAIN-SUFFIX,cdn.minescripts.info,🛑 Block',
        'DOMAIN-SUFFIX,cdn1.pebx.pl,🛑 Block',
        'DOMAIN-SUFFIX,cdnjs.cloudflane.com,🛑 Block',
        'DOMAIN-SUFFIX,cfcdist.gdn,🛑 Block',
        'DOMAIN-SUFFIX,clgserv.pro,🛑 Block',
        'DOMAIN-SUFFIX,cloud-miner.de,🛑 Block',
        'DOMAIN-SUFFIX,cloud-miner.eu,🛑 Block',
        'DOMAIN-SUFFIX,cloudcdn.gdn,🛑 Block',
        'DOMAIN-SUFFIX,cloudflane.com,🛑 Block',
        'DOMAIN-SUFFIX,cnhv.co,🛑 Block',
        'DOMAIN-SUFFIX,cnt.statistic.date,🛑 Block',
        'DOMAIN-SUFFIX,coin-have.com,🛑 Block',
        'DOMAIN-SUFFIX,coinblind.com,🛑 Block',
        'DOMAIN-SUFFIX,coinerra.com,🛑 Block',
        'DOMAIN-SUFFIX,coinhiveproxy.com,🛑 Block',
        'DOMAIN-SUFFIX,coinimp.com,🛑 Block',
        'DOMAIN-SUFFIX,coinimp.net,🛑 Block',
        'DOMAIN-SUFFIX,coinminingonline.com,🛑 Block',
        'DOMAIN-SUFFIX,coinnebula.com,🛑 Block',
        'DOMAIN-SUFFIX,coinpirate.cf,🛑 Block',
        'DOMAIN-SUFFIX,coinpot.co,🛑 Block',
        'DOMAIN-SUFFIX,coinrail.io,🛑 Block',
        'DOMAIN-SUFFIX,contribute.to-support.me,🛑 Block',
        'DOMAIN-SUFFIX,cryptaloot.pro,🛑 Block',
        'DOMAIN-SUFFIX,crypto-loot.com,🛑 Block',
        'DOMAIN-SUFFIX,crypto-webminer.com,🛑 Block',
        'DOMAIN-SUFFIX,crypto.csgocpu.com,🛑 Block',
        'DOMAIN-SUFFIX,cryptoloot.pro,🛑 Block',
        'DOMAIN-SUFFIX,d.cpufan.club,🛑 Block',
        'DOMAIN-SUFFIX,dark-utilities.me,🛑 Block',
        'DOMAIN-SUFFIX,dark-utilities.pw,🛑 Block',
        'DOMAIN-SUFFIX,dark-utilities.xyz,🛑 Block',
        'DOMAIN-SUFFIX,de-mi-nis-ner.info,🛑 Block',
        'DOMAIN-SUFFIX,de-ner-mi-nis4.info,🛑 Block',
        'DOMAIN-SUFFIX,de-nis-ner-mi-5.info,🛑 Block',
        'DOMAIN-SUFFIX,depttake.ga,🛑 Block',
        'DOMAIN-SUFFIX,dev.cryptobara.com,🛑 Block',
        'DOMAIN-SUFFIX,digger.cryptobara.com,🛑 Block',
        'DOMAIN-SUFFIX,dl.browsermine.com,🛑 Block',
        'DOMAIN-SUFFIX,donttbeevils.de,🛑 Block',
        'DOMAIN-SUFFIX,dronml.ml,🛑 Block',
        'DOMAIN-SUFFIX,easyhash.de,🛑 Block',
        'DOMAIN-SUFFIX,eth-pocket.com,🛑 Block',
        'DOMAIN-SUFFIX,eth-pocket.de,🛑 Block',
        'DOMAIN-SUFFIX,eth-pocket.eu,🛑 Block',
        'DOMAIN-SUFFIX,ethereum-cashcard.com,🛑 Block',
        'DOMAIN-SUFFIX,ethereum-cashcard.de,🛑 Block',
        'DOMAIN-SUFFIX,ethereum-cashcard.eu,🛑 Block',
        'DOMAIN-SUFFIX,ethereum-pocket.com,🛑 Block',
        'DOMAIN-SUFFIX,ethereum-pocket.de,🛑 Block',
        'DOMAIN-SUFFIX,ethereum-pocket.eu,🛑 Block',
        'DOMAIN-SUFFIX,ethtrader.de,🛑 Block',
        'DOMAIN-SUFFIX,eu.cfcdist.loan,🛑 Block',
        'DOMAIN-SUFFIX,eucsoft.com,🛑 Block',
        'DOMAIN-SUFFIX,evilsbedont.de,🛑 Block',
        'DOMAIN-SUFFIX,exdynsrv.com,🛑 Block',
        'DOMAIN-SUFFIX,f1tbit.com,🛑 Block',
        'DOMAIN-SUFFIX,flare-analytics.com,🛑 Block',
        'DOMAIN-SUFFIX,flighty.win,🛑 Block',
        'DOMAIN-SUFFIX,flightzy.date,🛑 Block',
        'DOMAIN-SUFFIX,flightzy.win,🛑 Block',
        'DOMAIN-SUFFIX,formulawire.com,🛑 Block',
        'DOMAIN-SUFFIX,freecontent.date,🛑 Block',
        'DOMAIN-SUFFIX,freecontent.science,🛑 Block',
        'DOMAIN-SUFFIX,freecontent.stream,🛑 Block',
        'DOMAIN-SUFFIX,freecontent.win,🛑 Block',
        'DOMAIN-SUFFIX,g1thub.com,🛑 Block',
        'DOMAIN-SUFFIX,ganymed.beeppool.org,🛑 Block',
        'DOMAIN-SUFFIX,gasolina.ml,🛑 Block',
        'DOMAIN-SUFFIX,go.bestmobiworld.com,🛑 Block',
        'DOMAIN-SUFFIX,go.fastspot.io,🛑 Block',
        'DOMAIN-SUFFIX,go.megabanners.cf,🛑 Block',
        'DOMAIN-SUFFIX,goldoffer.online,🛑 Block',
        'DOMAIN-SUFFIX,gramombird.com,🛑 Block',
        'DOMAIN-SUFFIX,gridiogrid.com,🛑 Block',
        'DOMAIN-SUFFIX,gxbrowser.net,🛑 Block',
        'DOMAIN-SUFFIX,hashing.win,🛑 Block',
        'DOMAIN-SUFFIX,hemnes.win,🛑 Block',
        'DOMAIN-SUFFIX,hhb123.tk,🛑 Block',
        'DOMAIN-SUFFIX,hide.ovh,🛑 Block',
        'DOMAIN-SUFFIX,hive.tubetitties.com,🛑 Block',
        'DOMAIN-SUFFIX,hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,hostingcloud.racing,🛑 Block',
        'DOMAIN-SUFFIX,hostingcloud.trade,🛑 Block',
        'DOMAIN-SUFFIX,hostingcloud.win,🛑 Block',
        'DOMAIN-SUFFIX,igrid.org,🛑 Block',
        'DOMAIN-SUFFIX,ijfcm7bu6ocerxsfq56ka3dtdanunyp4ytwk745b54agtravj2wr2qqd.onion.pet,🛑 Block',
        'DOMAIN-SUFFIX,ininmacerad.pro,🛑 Block',
        'DOMAIN-SUFFIX,intelserviceupdate.com,🛑 Block',
        'DOMAIN-SUFFIX,jqcdn01.herokuapp.com,🛑 Block',
        'DOMAIN-SUFFIX,jqcdn03.herokuapp.com,🛑 Block',
        'DOMAIN-SUFFIX,jqcdn2.herokuapp.com,🛑 Block',
        'DOMAIN-SUFFIX,jquery-cdn.download,🛑 Block',
        'DOMAIN-SUFFIX,jqwww.download,🛑 Block',
        'DOMAIN-SUFFIX,js.nahnoji.cz,🛑 Block',
        'DOMAIN-SUFFIX,jscdndel.com,🛑 Block',
        'DOMAIN-SUFFIX,jscoinminer.com,🛑 Block',
        'DOMAIN-SUFFIX,jshosting.party,🛑 Block',
        'DOMAIN-SUFFIX,jshosting.win,🛑 Block',
        'DOMAIN-SUFFIX,jurty.ml,🛑 Block',
        'DOMAIN-SUFFIX,krb.devphp.org.ua,🛑 Block',
        'DOMAIN-SUFFIX,laserveradedomaina.com,🛑 Block',
        'DOMAIN-SUFFIX,ledhenone.com,🛑 Block',
        'DOMAIN-SUFFIX,lightminer.co,🛑 Block',
        'DOMAIN-SUFFIX,losital.ru,🛑 Block',
        'DOMAIN-SUFFIX,machieved.com,🛑 Block',
        'DOMAIN-SUFFIX,mail.ghmproperties.com,🛑 Block',
        'DOMAIN-SUFFIX,mail.itseasy.com,🛑 Block',
        'DOMAIN-SUFFIX,mail.shaferglazer.com,🛑 Block',
        'DOMAIN-SUFFIX,mail.techniservinc.com,🛑 Block',
        'DOMAIN-SUFFIX,mebablo.com,🛑 Block',
        'DOMAIN-SUFFIX,mepirtedic.com,🛑 Block',
        'DOMAIN-SUFFIX,mi-de-ner-nis3.info,🛑 Block',
        'DOMAIN-SUFFIX,mine.blank.drawpad.org,🛑 Block',
        'DOMAIN-SUFFIX,mine.nahnoji.cz,🛑 Block',
        'DOMAIN-SUFFIX,mine.terorie.com,🛑 Block',
        'DOMAIN-SUFFIX,mine.torrent.pw,🛑 Block',
        'DOMAIN-SUFFIX,minemytraffic.com,🛑 Block',
        'DOMAIN-SUFFIX,miner.beeppool.org,🛑 Block',
        'DOMAIN-SUFFIX,miner.cryptobara.com,🛑 Block',
        'DOMAIN-SUFFIX,miner.nablabee.com,🛑 Block',
        'DOMAIN-SUFFIX,miner.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,minerad.com,🛑 Block',
        'DOMAIN-SUFFIX,minero-proxy-01.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,minero-proxy-02.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,minero-proxy-03.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,minero.pw,🛑 Block',
        'DOMAIN-SUFFIX,minescripts.info,🛑 Block',
        'DOMAIN-SUFFIX,minexmr.stream,🛑 Block',
        'DOMAIN-SUFFIX,minr.pw,🛑 Block',
        'DOMAIN-SUFFIX,mm.zubovskaya-banya.ru,🛑 Block',
        'DOMAIN-SUFFIX,mon-deu-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,mon-deu-2.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,mon-deu-3.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,mon-fra-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,mon-fra-2.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,mon-gbr-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,monero-miner.com,🛑 Block',
        'DOMAIN-SUFFIX,monerominer.rocks,🛑 Block',
        'DOMAIN-SUFFIX,money-maker-default.info,🛑 Block',
        'DOMAIN-SUFFIX,mxcdn1.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,mxcdn2.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,my.domain,🛑 Block',
        'DOMAIN-SUFFIX,nametraff.com,🛑 Block',
        'DOMAIN-SUFFIX,nathetsof.com,🛑 Block',
        'DOMAIN-SUFFIX,nch-software.info,🛑 Block',
        'DOMAIN-SUFFIX,nerohut.com,🛑 Block',
        'DOMAIN-SUFFIX,new.minr.pw,🛑 Block',
        'DOMAIN-SUFFIX,nfwebminer.com,🛑 Block',
        'DOMAIN-SUFFIX,niematego.tk,🛑 Block',
        'DOMAIN-SUFFIX,nim.sh,🛑 Block',
        'DOMAIN-SUFFIX,nimiq.icemining.ca,🛑 Block',
        'DOMAIN-SUFFIX,nimiq.terorie.com,🛑 Block',
        'DOMAIN-SUFFIX,nimiqpool.com,🛑 Block',
        'DOMAIN-SUFFIX,nimwss-us-shark.lolopool.com,🛑 Block',
        'DOMAIN-SUFFIX,ninaning.com,🛑 Block',
        'DOMAIN-SUFFIX,nitrokod.com,🛑 Block',
        'DOMAIN-SUFFIX,nmq.zxnexus.com,🛑 Block',
        'DOMAIN-SUFFIX,node.nimiq.watch,🛑 Block',
        'DOMAIN-SUFFIX,notmining.org,🛑 Block',
        'DOMAIN-SUFFIX,npcdn1.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,nvidia-graphics.top,🛑 Block',
        'DOMAIN-SUFFIX,nvidiacenter.com,🛑 Block',
        'DOMAIN-SUFFIX,ocean2.authcaptcha.com,🛑 Block',
        'DOMAIN-SUFFIX,offerreality.com,🛑 Block',
        'DOMAIN-SUFFIX,ogrid.org,🛑 Block',
        'DOMAIN-SUFFIX,okeyletsgo.ml,🛑 Block',
        'DOMAIN-SUFFIX,p.estream.to,🛑 Block',
        'DOMAIN-SUFFIX,panelsave.com,🛑 Block',
        'DOMAIN-SUFFIX,panger-top.click,🛑 Block',
        'DOMAIN-SUFFIX,papoto.com,🛑 Block',
        'DOMAIN-SUFFIX,party-vqgdyvoycc.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,pearno.com,🛑 Block',
        'DOMAIN-SUFFIX,pertholin.com,🛑 Block',
        'DOMAIN-SUFFIX,play.estream.to,🛑 Block',
        'DOMAIN-SUFFIX,play.estream.xyz,🛑 Block',
        'DOMAIN-SUFFIX,play.gramombird.com,🛑 Block',
        'DOMAIN-SUFFIX,play.istlandoll.com,🛑 Block',
        'DOMAIN-SUFFIX,play.mine.gay-hotvideo.net,🛑 Block',
        'DOMAIN-SUFFIX,play.nexioniect.com,🛑 Block',
        'DOMAIN-SUFFIX,play.on.animeteatr.ru,🛑 Block',
        'DOMAIN-SUFFIX,play.pampopholf.com,🛑 Block',
        'DOMAIN-SUFFIX,play.play.estream.to,🛑 Block',
        'DOMAIN-SUFFIX,play.play.estream.xyz,🛑 Block',
        'DOMAIN-SUFFIX,play.tercabilis.info,🛑 Block',
        'DOMAIN-SUFFIX,play.video2.stream.vidzi.tv,🛑 Block',
        'DOMAIN-SUFFIX,play.vidzi.tv,🛑 Block',
        'DOMAIN-SUFFIX,pool.hws.ru,🛑 Block',
        'DOMAIN-SUFFIX,pr0gram.org,🛑 Block',
        'DOMAIN-SUFFIX,premiumstats.xyz,🛑 Block',
        'DOMAIN-SUFFIX,proofly.win,🛑 Block',
        'DOMAIN-SUFFIX,proxy-can-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,proxy-deu-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,proxy-deu-2.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,proxy-fra-3.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,proxy-gbr-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,proxy-pol-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,proxy-pol-2.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,reauthenticator.com,🛑 Block',
        'DOMAIN-SUFFIX,renhertfo.com,🛑 Block',
        'DOMAIN-SUFFIX,roastedvolt.net,🛑 Block',
        'DOMAIN-SUFFIX,rock.reauthenticator.com,🛑 Block',
        'DOMAIN-SUFFIX,rock2.authcaptcha.com,🛑 Block',
        'DOMAIN-SUFFIX,rocks.io,🛑 Block',
        'DOMAIN-SUFFIX,s01.hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,s03.hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,s04.hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,s05.hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,s07.hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,s100.hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,s11.hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,s12.hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,s13.hostcontent.live,🛑 Block',
        'DOMAIN-SUFFIX,s3.pampopholf.com,🛑 Block',
        'DOMAIN-SUFFIX,sass2.authcaptcha.com,🛑 Block',
        'DOMAIN-SUFFIX,scaleway.ovh,🛑 Block',
        'DOMAIN-SUFFIX,sea2.authcaptcha.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-1.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-1.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-1.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-10.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-10.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-10.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-11.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-11.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-11.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-12.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-12.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-12.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-13.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-13.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-13.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-14.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-14.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-14.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-15.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-15.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-15.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-16.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-16.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-16.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-17.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-17.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-17.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-18.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-18.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-18.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-19.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-19.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-19.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-2.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-2.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-2.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-20.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-20.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-20.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-3.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-3.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-3.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-4.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-4.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-4.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-5.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-5.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-5.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-6.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-6.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-6.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-7.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-7.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-7.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-8.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-8.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-8.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-9.nimiq-network.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-9.nimiq.com,🛑 Block',
        'DOMAIN-SUFFIX,seed-9.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-can-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-can-2.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-deu-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-deu-2.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-deu-3.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-deu-4.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-fra-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-fra-3.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-gbr-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-gbr-2.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-pol-1.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-pol-2.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-pol-3.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed-pol-4.inf.nimiq.network,🛑 Block',
        'DOMAIN-SUFFIX,seed.nimiq.by,🛑 Block',
        'DOMAIN-SUFFIX,seed.nimiq.jp,🛑 Block',
        'DOMAIN-SUFFIX,seed.nimiqpool.com,🛑 Block',
        'DOMAIN-SUFFIX,serie-vostfr.com,🛑 Block',
        'DOMAIN-SUFFIX,serv1swork.com,🛑 Block',
        'DOMAIN-SUFFIX,service4refresh.info,🛑 Block',
        'DOMAIN-SUFFIX,silimbompom.com,🛑 Block',
        'DOMAIN-SUFFIX,site.flashx.cc,🛑 Block',
        'DOMAIN-SUFFIX,sparechange.io,🛑 Block',
        'DOMAIN-SUFFIX,srcip.com,🛑 Block',
        'DOMAIN-SUFFIX,srcips.com,🛑 Block',
        'DOMAIN-SUFFIX,statdynamic.com,🛑 Block',
        'DOMAIN-SUFFIX,static.sparechange.io,🛑 Block',
        'DOMAIN-SUFFIX,staticsfs.host,🛑 Block',
        'DOMAIN-SUFFIX,stone2.authcaptcha.com,🛑 Block',
        'DOMAIN-SUFFIX,stonecalcom.com,🛑 Block',
        'DOMAIN-SUFFIX,str1kee.com,🛑 Block',
        'DOMAIN-SUFFIX,sunnimiq.cf,🛑 Block',
        'DOMAIN-SUFFIX,sunnimiq5.cf,🛑 Block',
        'DOMAIN-SUFFIX,sunnimiq6.cf,🛑 Block',
        'DOMAIN-SUFFIX,swiftmining.win,🛑 Block',
        'DOMAIN-SUFFIX,sxcdn02.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,sxcdn1.herokuapp.com,🛑 Block',
        'DOMAIN-SUFFIX,sxcdn4.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,sxcdn5.herokuapp.com,🛑 Block',
        'DOMAIN-SUFFIX,sxcdn6.now.sh,🛑 Block',
        'DOMAIN-SUFFIX,test.minr.pw,🛑 Block',
        'DOMAIN-SUFFIX,thewhizmarketing.com,🛑 Block',
        'DOMAIN-SUFFIX,thewhizproducts.com,🛑 Block',
        'DOMAIN-SUFFIX,thewise.com,🛑 Block',
        'DOMAIN-SUFFIX,traffic.tc-clicks.com,🛑 Block',
        'DOMAIN-SUFFIX,trustaproiam.de,🛑 Block',
        'DOMAIN-SUFFIX,trusteverything.de,🛑 Block',
        'DOMAIN-SUFFIX,tulip18.com,🛑 Block',
        'DOMAIN-SUFFIX,uoldid.ru,🛑 Block',
        'DOMAIN-SUFFIX,us.cfcdist.loan,🛑 Block',
        'DOMAIN-SUFFIX,vceilinichego.ru,🛑 Block',
        'DOMAIN-SUFFIX,verifier.live,🛑 Block',
        'DOMAIN-SUFFIX,video.streaming.estream.to,🛑 Block',
        'DOMAIN-SUFFIX,videoplayer2.xyz,🛑 Block',
        'DOMAIN-SUFFIX,vkcdnservice.com,🛑 Block',
        'DOMAIN-SUFFIX,vmi503011.contaboserver.net,🛑 Block',
        'DOMAIN-SUFFIX,vuryua.ru,🛑 Block',
        'DOMAIN-SUFFIX,webapi.salamantex.com,🛑 Block',
        'DOMAIN-SUFFIX,webapi.staging.salamantex.com,🛑 Block',
        'DOMAIN-SUFFIX,webassembly.stream,🛑 Block',
        'DOMAIN-SUFFIX,webmine.cz,🛑 Block',
        'DOMAIN-SUFFIX,webmine.pro,🛑 Block',
        'DOMAIN-SUFFIX,webminepool.com,🛑 Block',
        'DOMAIN-SUFFIX,webminerpool.com,🛑 Block',
        'DOMAIN-SUFFIX,webmining.co,🛑 Block',
        'DOMAIN-SUFFIX,webxmr.com,🛑 Block',
        'DOMAIN-SUFFIX,wordc.ga,🛑 Block',
        'DOMAIN-SUFFIX,wp-monero-miner.de,🛑 Block',
        'DOMAIN-SUFFIX,wpcdn1.herokuapp.com,🛑 Block',
        'DOMAIN-SUFFIX,wss.nablabee.com,🛑 Block',
        'DOMAIN-SUFFIX,wss.rand.com.ru,🛑 Block',
        'DOMAIN-SUFFIX,wtm.monitoringservice.co,🛑 Block',
        'DOMAIN-SUFFIX,xmr.2miners.com,🛑 Block',
        'DOMAIN-SUFFIX,xmr.cool,🛑 Block',
        'DOMAIN-SUFFIX,zymerget.win,🛑 Block',
        // 漏网之鱼
        'MATCH,🐟 漏网之鱼',
    ],
];

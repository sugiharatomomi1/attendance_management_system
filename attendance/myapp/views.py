from django.shortcuts import render
from django.http import HttpResponse
import nfc
import binascii

def nfc_test(request):
    suica=nfc.clf.RemoteTarget("212F")
    suica.sensf_req=bytearray.fromhex("0000030000")
    
    idm = None  # idm の初期化
    
    with nfc.ContactlessFrontend("usb") as clf:
        target = clf.sense(suica, iterations=3, interval=1.0)
        
        while target:
            tag = nfc.tag.activate(clf, target)
            tag.sys = 3
            idm = binascii.hexlify(tag.idm).decode()
            print(idm)
            break  # ターゲットのループを終了

        if idm is not None:
            Text = '読み取りに成功しました。'
        else:
            Text = '読み取りに失敗しました.'

    context = {
        'text': Text,
        'card_idm': idm,
    }

    return render(request, 'nfc_test.html', context)

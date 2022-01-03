# -*- coding: utf-8 -*-
"""
The Shadow Shark Downloader library.

@author: Mr. Shark Spam Bot
"""
import urllib.request
import argparse
import codecs
import json
import os

def get_arguments():
    '''Get the file and url.'''
    parser = argparse.ArgumentParser(description='''The Shadow Shark Downloader library.''')
    parser.add_argument('-f', '--file', dest='file', required=True, type=str,
                        help='The file to download.')
    parser.add_argument('-u', '--url', dest='url', required=True, type=str,
                        help='The url to send the file to.')
    options = parser.parse_args()
    file = options.file
    url = options.url
    if not os.path.exists(file):
        parser.error('Invalid value specified for file.')
    return [file, url]

def main():
    '''Read the file and send it to the server.'''
    file = arguments[0]
    url = arguments[1]
    with open(file, 'rb') as data:
        data = data.read()
    data = codecs.encode(data, encoding='base64').decode()
    jsondata = {'type': 'file', 'encoding': 'base64', 'name': file, 'payload': data}
    jsondata = json.dumps(jsondata)
    post = urllib.request.urlopen(url, data=jsondata.encode())
    post.close()
    print(f'[+] Successfully downloaded {file}.')

if __name__ == '__main__':
    arguments = get_arguments()
    main()

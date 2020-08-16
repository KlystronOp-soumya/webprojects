from tkinter import *
from tkinter import messagebox
import os
from pytube import YouTube

def downloadVideo(link):
    path=r"D://youtube"
    if(os.path.isdir(path)):
        pass
        
    else:
        os.mkdir(path)
    
    try:
        yt=YouTube(link)
        stream=yt.streams.first()
        messagebox.showwarning("Information","Downloading")
        stream.download(path)
        messagebox.showinfo("Information","completed")

    except Exception as e:
        messagebox.showerror("Information","Error")
    
def downloadAudio(link):
    path=r"D://youtube"
    if(os.path.isdir(path)):
        pass
        
    else:
        os.mkdir(path)
    
    try:
        yt=YouTube(link)
        stream=yt.streams.filter(only_audio=True).first()
        messagebox.showwarning("Information","Downloading(might be mp4)")
        stream.download(path)
        messagebox.showinfo("Information","completed@D:/youtube")

    except Exception as e:
        messagebox.showerror("Information","Error downloading")

def getvalue1():
    inputValue=""
    print("called")
    inputValue=ent.get("1.0","end")
    print(inputValue)
    downloadVideo(inputValue)

    #call the methods from the downloader.py

def getvalue2():
    inputValue=""
    print("called")
    inputValue=ent.get("1.0","end")
    print(inputValue)
    downloadAudio(inputValue)

    
    
   


    
    
if __name__ == "__main__":
    root=Tk()
    root.title("Video Downloader")
    root.geometry("600x300")
    root.resizable(0,0)
    root.configure(background='#2c2c2c')
    photo = PhotoImage(file = "youtube-dl-icon.png")
    root.iconphoto(False, photo)
    
    lbl1=Label(root,text="Youtube Video/Audio Downloader",font=('Comic Sans MS','-25','bold'),fg="cyan",bg="#2c2c2c")
    lbl1.place(x=90,y=13)
    ent=Text(root,width=40,height=1.4,bg="#2c2c2c",fg="white",font=('Vendara'),bd=1,insertbackground="white")
    ent.place(x=35,y=95)
    bv=Button(root,text="Video",width=10,height=1,bg="#f44336",fg="white",activebackground="#e91e63",command=getvalue1)
    bv.place(x=488,y=95)
    ba=Button(root,text="Audio",width=10,height=1,bg="#7e57c2",fg="white",activebackground="#e91e63",command=getvalue2)
    ba.place(x=488,y=130)
 

    
    root.mainloop()
       
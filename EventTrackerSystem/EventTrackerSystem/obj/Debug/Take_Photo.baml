   M S B A M L   `   `   `  ����H  DWebcamControl, Version=3.1.0.0, Culture=neutral, PublicKeyToken=nullD2clr-namespace:WebcamControl;assembly=WebcamControlWebcamControl  5       EventTrackerSystem#   EventTrackerSystem.Take_Photo   5      R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5      R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5      Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5      Bcam2clr-namespace:WebcamControl;assembly=WebcamControl     5      @d2http://schemas.microsoft.com/expression/blend/2008     5        N� Title$  
Take_Photo��5
      .��5      � ��5   
   �� 5       �� ImageSource$? 9/EventTrackerSystem;component/Images/main-background1.jpg��6   .+�5      �� -   5        $��canvas1��5   f   $	��453��6   $
��Left=�6$   
�������$��
293,94,0,0q�6R   $	��Top=�6u   $	��790��6�   .+�5         WebcamControl.Webcam  -   5        $��
WebcamCtrl��5      $��Stretch=�6+   $��Stretch=�6I    �� Left$ 43��6e   
 �� Top$ 33��6v   $	��302��6�   $	��280��6�   �� 5      -   5         ��Name$ VideoDevicesComboBox��5      $��22��5      $	��210��6#   $
��Left=�6/   $	��Top=�6J   $y�Hidden=�5   :   �� 5      -   5        $��TakePhoto_button��5   Z   $ 71��6   $	 365��6&   $��Take Picture��67   $��71��6N   $	��268��6r   $��35(�6~   $��Arial)�6�   $
��Bold"�6�   ���	#FF2121D66�   5      �� 5   
   -   5         ��Name$ Back_button��5   �   $��< Back��6   $��40(�6%   $��Arial)�63   $
��Bold"�6F   $��86��6Y   $
��Left=�6e   $��293,570,0,0q�6�   $	��Top=�6�   $	��168��6�   ���	#FF2121D66�   �� 5   
   -   5        $��Finish_button��5   �   ���	#FF2121D6$��Finish��6)   $��Arial)�6:   $��40(�6M   $
��Bold"�6[   $��86��6m   $
��Left=�6y   $��915,570,0,0q�6�   $	��Top=�6�   $	��168��6�   6�   �� 5   
   -   5         ��Name$ 	imagePrev��5      $
��Left=�6#   $	��257��6>   $��734,142,0,0q�6K   $	��Top=�6`   $	��292��6x   � 5   
   -   5         �Name$ progressBarControl��5      $
��Left=�62   $��31��6M   $��1166,24,0,0q�6Y   $	��Top=�6n   $	��174��6�    � Minimum$ 0Q�6�   	 � Maximum$	 60Q�6�   �� 5   
   -	   5        $��txtValue��5   �   $�� ��6   $
��Left=�6   $��31��67   $��1231,24,0,0q�6C   $	��Top=�6X   $��77��6p   $��25(�6{   6�   �� 5   
   -
   5        $��btnHome��5   x   $�� ��6   $
��Left=�6   $��10,0,0,0q�67   $	��Top=�6I   $��79��6a   $��77��6l   ��5      �� 5       $: 4/EventTrackerSystem;component/Images/home_button.png��6   5"      5#      5$      
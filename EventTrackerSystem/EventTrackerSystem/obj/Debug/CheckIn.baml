   M S B A M L   `   `   `  ����  EventTrackerSystem     EventTrackerSystem.CheckIn   5      R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5      R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5      Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5      @d2http://schemas.microsoft.com/expression/blend/2008     5        N� Title$  CheckIn��5      .��5
      � ��5   
   �� 5       �� ImageSource$? 9/EventTrackerSystem;component/Images/main-background1.jpg��6   .+�5   
   �� -   5         ��Name$ 
txtCheckIn��5   O   $��69��6   $
��Left=�6    $��
342,30,0,0q�6;   $ ��Check In with your Card ID��6c   $��50(�6�   $��Arial)�6�   $
��Bold"�6�   
�������$	��Top=�6�   $	��709��6�   �� 5   
   $��Enter Card ID : ��6   $��310,112,0,0q�6+   $��25(�6@   
�������$	��Top=�6a   $
��Left=�6y   �� 5   
   -   5         ��Name$ 	txtGetUID��5      $
��Left=�6%   $��57��6@   $��510,104,0,0q�6L    �� TextWrapping$
 Wrap=�6a   $��25(�6u   $�� ��6�   $	��Top=�6�   $	��461��6�   �� 5   
   -   5         ��Name$ CheckIn_Button��5   �   $��Check In��6   $��65��6$   $��30(�60   $��Arial)�6>   $
��Bold"�6Q   $
��Left=�6d   $��
571,0,0,10q�6   $��Bottom=�6�   $	��295��6�   
����������	#FF2121D66�   �� 5   
   $
��Left=�6   $	��400��6,   $��571,181,0,0q�69   $	��Top=�6N   $	��295��6f   
�������.+�5      �� -   5         ��Name$ 
imgPicture��5      $	��181��6(    �� Left$ 39��65   
 �� Top$ 83��6F   $	��217��6V   �� 5      $��ID : ��6   $ 22��6$   $ 25��65   �� 5      -   5        $ txtUID��5      $ 58��6(   $
��Wrap=�69   $ 30��6M   $	��207��6]   $��21��6i   �� 5      -   5        $ txtNameCombined��5      $��23��61   $ 39��6=   $
��Wrap=�6N   $	 291��6b   $	��195��6s   $�� ��6   5      �� 5   
   -   5        $ Load_Button��5   �   $
��Load��6   $��57��6    $��30(�6,   $��Arial)�6:   $
��Bold"�6M   $
��Left=�6`   $��976,104,0,0q�6{   $	��Top=�6�   $	��127��6�   
����������	#FF2121D6	 J� RenderTransformOrigin$	 0.5,0.5&�6
  � 5   
   -   5        
 �Name$
 progressBarControl��5      $
��Left=�62   $��31��6M   $��1166,24,0,0q�6Y   $	��Top=�6n   $	��174��6�    � Minimum$ 0Q�6�    � Maximum$ 60Q�6�   �� 5   
   -	   5        $��txtValue��5   �   $�� ��6   $
��Left=�6   $��31��67   $��1231,24,0,0q�6C   $	��Top=�6X   $��77��6p   $��25(�6{   6�   �� 5   
   -
   5        $��btnHome��5   x   $�� ��6   $
��Left=�6   $��10,0,0,0q�67   $	��Top=�6I   $��79��6a   $��77��6l   ��5      �� 5      $: 4/EventTrackerSystem;component/Images/home_button.png��6   5       5!      5"      
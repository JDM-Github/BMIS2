from sense_hat import SenseHat
import time

sense = SenseHat()
full_name = "John Dave Pega"
white = (255, 255, 255)

for letter in full_name:
    sense.show_letter(letter, text_color=white)
    time.sleep(1)

sense.clear() 


from sense_hat import SenseHat
import time

sense = SenseHat()

birthday = "12/08"

white = (255, 255, 255)
for digit in birthday:
    sense.show_letter(digit, text_color=white)
    time.sleep(1)  
sense.clear() 


from sense_hat import SenseHat
import time

sense = SenseHat()

smiley_face = [
    (0, 0, 0), (0, 0, 0), (255, 255, 0), (255, 255, 0), (255, 255, 0), (255, 255, 0), (0, 0, 0), (0, 0, 0),
    (0, 0, 0), (0, 0, 0), (255, 255, 0), (255, 255, 0), (255, 255, 0), (255, 255, 0), (0, 0, 0), (0, 0, 0),
    (0, 0, 0), (255, 255, 0), (255, 255, 0), (0, 0, 0), (0, 0, 0), (0, 0, 0), (255, 255, 0), (0, 0, 0),
    (0, 0, 0), (0, 0, 0), (0, 0, 0), (255, 255, 0), (0, 0, 0), (0, 0, 0), (0, 0, 0), (0, 0, 0),
    (0, 0, 0), (0, 0, 0), (255, 255, 0), (0, 0, 0), (0, 0, 0), (0, 0, 0), (255, 255, 0), (0, 0, 0),
    (0, 0, 0), (0, 0, 0), (0, 0, 0), (0, 0, 0), (0, 0, 0), (0, 0, 0), (0, 0, 0), (0, 0, 0)
]

sense.set_pixels(smiley_face)
time.sleep(3)
sense.clear() 
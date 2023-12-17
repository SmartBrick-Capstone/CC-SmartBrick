from flask import Flask, request, jsonify
from keras.models import load_model  # TensorFlow is required for Keras to work
from PIL import Image, ImageOps  # Install pillow instead of PIL
import numpy as np

app = Flask(__name__)

# Disable scientific notation for clarity
np.set_printoptions(suppress=True)

# Load the model
# sesuaikan dengan Yang sudah diupload
model = load_model("keras_model.h5", compile=False)

# Load the labels
# Sesuikan dengan yang sudah di upload berdasarkan data terbaru
class_names = open("labels.txt", "r").readlines()

@app.route('/predict', methods=['POST'])
def predict() :
  file = request.files['image']
  image = Image.open(file).convert("RGB")
  size = (224, 224)
  image = ImageOps.fit(image, size, Image.Resampling.LANCZOS)
  image_array = np.asarray(image)
  normalized_image_array = (image_array.astype(np.float32) / 127.5) - 1
  data = np.ndarray(shape=(1, 224, 224, 3), dtype=np.float32)
  data[0] = normalized_image_array

  prediction = model.predict(data)
  class_index = np.argmax(prediction)
  predicted_class = class_names[class_index]
  confidence = prediction[0][class_index] * 100 

  if(confidence>0.9):
    if(predicted_class == class_names[5] or predicted_class == class_names[1]):
        result = 'Benda ini layak dijadikan eco-brick'
    else:
        result = 'Benda ini tidak layak dijadikan eco-brick'
  else:
    result = 'Object tidak diketahui'

  return jsonify({
    'success' : True,
    'prediction' : result,
  })

if __name__ == '__main__':
  app.run(port=5000, debug=True)

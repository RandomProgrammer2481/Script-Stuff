from pathlib import Path
from PIL import Image

input_dir = Path("./cards/")
SCALE = 3

for png_path in input_dir.glob("*.png"):
    img = Image.open(png_path)
    new_size = (img.width * SCALE, img.height * SCALE)
    scaled = img.resize(new_size, Image.NEAREST)
    scaled.save(png_path)
    print(f"Scaled {png_path.name} -> {new_size}")

print("Done!")